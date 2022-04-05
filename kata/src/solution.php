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
        if ($frames[0] === 'x' || str_contains($frames[0], '/')) {
            return 10;
        }

        $formattedFrame = $this->replaceMissBy0($frames[0]);

        return (int) $formattedFrame[0] + (int) $formattedFrame[1];
    }

    private function replaceMissBy0(string $frame): string
    {
        return str_replace('-', '0', $frame);
    }
}
