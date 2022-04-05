<?php

declare(strict_types=1);

namespace Kata;

class Solution
{
    public function example(): bool
    {
        return true;
    }

    public function calculateBowlingScore(array $frames): int
    {
        $index = 0;
        if ($frames[$index] === 'x' || str_contains($frames[$index], '/')) {
            return 10;
        }

        $formattedFrame = $this->replaceMissBy0($frames[$index]);

        if (isset($frames[$index + 1])) {
            return (int) $formattedFrame[0] + (int) $formattedFrame[1] + $this->calculateBowlingScore(array_slice($frames, 1));
        }
        return (int) $formattedFrame[0] + (int) $formattedFrame[1];
    }

    private function replaceMissBy0(string $frame): string
    {
        return str_replace('-', '0', $frame);
    }
}
