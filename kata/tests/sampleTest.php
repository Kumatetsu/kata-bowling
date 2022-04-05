<?php

declare(strict_types=1);

namespace Kata\Tests;

use Kata\Solution;
use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    /**
     * @test
     * @covers
    */
    public function assertTrues()
    {
        $solution = new Solution();
        $this->assertTrue($solution->example(), 'Solution example is not returning true');
    }

    /**
     * @test
     * @covers
     */
    public function scoreCalculator()
    {
        $solution = new Solution();
        $this->assertSame($solution->calculateBowlingScore('--'), 0, 'score should be 0');
        $this->assertSame($solution->calculateBowlingScore('1-'), 1, 'score should be 1');
        $this->assertSame($solution->calculateBowlingScore('2-'), 2, 'score should be 2');
        $this->assertSame($solution->calculateBowlingScore('-1'), 1, 'score should be 1');
        $this->assertSame($solution->calculateBowlingScore('21'), 3, 'score should be 3');
        $this->assertSame($solution->calculateBowlingScore('x'), 10, 'score should be 10');
    }
}
