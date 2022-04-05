<?php

declare(strict_types=1);

namespace Kata;

class Solution
{
    public function example(): bool
    {
        return true;
    }

    public function calculateBowlingScore($frame)
    {
        if ($frame === '--') {
            return 0;
        }

        if (!str_contains($frame, '-')) {
            return (int) $frame[0] + (int) $frame[1];
        }

        if ($frame[0] === '-') {
            return (int) $frame[1];
        }

        return (int) $frame[0];
    }
}
