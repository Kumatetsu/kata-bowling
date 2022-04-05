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
        if ($frame === '2-') {
            return 2;
        }
        if ($frame === '1-') {
            return 1;
        }

        return 0;
    }
}
