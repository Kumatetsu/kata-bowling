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
        if ($frame === 'x' || str_contains($frame, '/')) {
            return 10;
        }

        $formattedFrame = $this->replaceMissBy0($frame);

        return (int) $formattedFrame[0] + (int) $formattedFrame[1];
    }

    private function replaceMissBy0($frame)
    {
        return str_replace('-', '0', $frame);
    }
}
