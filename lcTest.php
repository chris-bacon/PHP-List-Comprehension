<?php

namespace Test;

require(__DIR__."/lc.php");

use PHPUnit\Framework\TestCase;

class LCTest extends TestCase
{
    public function testLc()
    {
        $expected =[ // Input => Expected output
            "[x | x <- [1..5]]" => [1, 2, 3, 4, 5],
            "[x | x <- [10..20]]" => [10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
            "[x | x <- [1..5], x == 1]" => [1],
            "[x | x <- [1..5], x > 2]" => [3, 4, 5],
            "[x | x <- [1..5], x >= 2]" => [2, 3, 4, 5],
            "[x | x <- [1..5], x < 2]" => [1],
            "[x | x <- [1..5], x <= 2]" => [1, 2],
            "[x | x <- [2..4], x + 3]" => [5, 6, 7],
            "[x | x <- [10..12], x - 1]" => [9, 10, 11],
            "[x | x <- [2..4], x / 2]" => [1, 1.5, 2],
            "[x | x <- [2..4], x % 2]" => [0, 1, 0],
            "[x | x <- [1..10], x mod 2]" => ["Operator empty", "Predicate condition not appropriate", "Operator not allowed"]
        ];
        foreach ($expected as $inputVal => $e) {
            $this->assertEquals($e, lc($inputVal));
        }
    }
}
