<?php

declare(strict_types=1);

namespace Kata;

class Solution
{
    private const MAX_SCORE = 10;
    private const MIN_SCORE = 0;
    private const MAX_ROUND = 10;
    private const STRIKE = 'x';
    private const MISS = '-';
    private const SPARE = '/';

    public function example(): bool
    {
        return true;
    }

    public function calculateBowlingScore(array $frames, $round = 1): int
    {
        if (empty($frames)) {
            return 0;
        }

        $frame = array_shift($frames);

        return $this->isBonusRound($round)
            ? $this->calculateBowlingScore($frames, $round + 1)
            : $this->calculateFrameScore($frame) + $this->getBonusScore($frame, $frames) + $this->calculateBowlingScore($frames, $round + 1);
    }

    private function getBonusScore(string $frame, array $frames): int
    {
        if (!isset($frames[0])) {
            return 0;
        }

        if ($this->isSpare($frame)) {
            return $this->getSpareBonus($frames);
        }

        if ($this->isStrike($frame)) {
            return $this->getStrikeBonus($frames);
        }

        return 0;
    }

    private function getStrikeBonus(array $frames, $count = 1): int
    {
        $nextFrame = $frames[0] ?? null;
        if (!$nextFrame) {
            return 0;
        }

        $firstThrow = $nextFrame[0];
        if ($count > 1) {
            return $this->calculateFrameScore($firstThrow);
        }

        return $this->isStrike($firstThrow)
            ?  ($this->calculateFrameScore($firstThrow) + $this->getStrikeBonus($frames, $count + 1))
            : $this->calculateFrameScore($nextFrame);
    }

    private function getSpareBonus(array $frames) {
        return isset($frames[0]) ? $this->calculateFrameScore($frames[0][0]) : 0;
    }

    private function isSpare(string $frame): bool
    {
        return strcmp($frame[-1], self::SPARE) === 0;
    }

    private function isStrike(string $frame): bool
    {
        return strcmp($frame[0], self::STRIKE) === 0;
    }

    private function isBonusRound(int $round): bool
    {
        return $round > self::MAX_ROUND;
    }

    private function calculateFrameScore(string $frame): int
    {
        return array_sum($this->replaceSignes($frame));
    }

    private function getRest($frame): int
    {
        return self::MAX_SCORE - (int) $frame[0];
    }

    private function replaceSignes(string $frame): array
    {
        return str_replace(
            [self::MISS, self::SPARE, self::STRIKE],
            [self::MIN_SCORE, $this->getRest($frame), self::MAX_SCORE],
            str_split($frame)
        );
    }
}
