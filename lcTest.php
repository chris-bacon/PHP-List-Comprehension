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
            "[x | x <- [1..5], x <= 2]" => [1, 2]
        ];
        foreach ($expected as $inputVal => $e) {
            $this->assertEquals($e, lc($inputVal));
        }
    }
}
