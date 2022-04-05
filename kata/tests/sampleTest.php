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
    public function oneScoreCalculator()
    {
        $solution = new Solution();
        $this->assertSame($solution->calculateBowlingScore(['--']), 0, 'score should be 0');
        $this->assertSame($solution->calculateBowlingScore(['1-']), 1, 'score should be 1');
        $this->assertSame($solution->calculateBowlingScore(['2-']), 2, 'score should be 2');
        $this->assertSame($solution->calculateBowlingScore(['-1']), 1, 'score should be 1');
        $this->assertSame($solution->calculateBowlingScore(['21']), 3, 'score should be 3');
        $this->assertSame($solution->calculateBowlingScore(['x']), 10, 'score should be 10');
        $this->assertSame($solution->calculateBowlingScore(['9/']), 10, 'score should be 10');
    }

    /**
     * @test
     * @covers
     */
    public function multipleScoreCalculator()
    {
        $solution = new Solution();
        $this->assertSame($solution->calculateBowlingScore(['--', '1-']), 1, 'score should be 1');
        $this->assertSame($solution->calculateBowlingScore(['-5', '2-']), 7, 'score should be 7');
        $this->assertSame($solution->calculateBowlingScore(['-5', '2-', 'x']), 17, 'score should be 17');
        $this->assertSame($solution->calculateBowlingScore(['-/', '2-']), 14, 'score should be 14');
        $this->assertSame($solution->calculateBowlingScore(['5/', '5/',  '5/',  '5/',  '5/',  '5/',  '5/',  '5/',  '5/',  '5/', '5']), 150, 'score should be 150');
        $this->assertSame($solution->calculateBowlingScore(['x', 'x',  'x',  'x',  'x',  'x',  'x',  'x',  'x',  'x', 'x', 'x']), 300, 'score should be 300');
    }
}
