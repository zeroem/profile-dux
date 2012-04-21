<?php

namespace Dux\Test;

use Dux\MicroTime;
class MicroTimeTest extends \PHPUnit_Framework_TestCase
{
    public function testDiff() {
        $a = new MicroTime(10,5);
        $b = new MicroTime(9,0);

        $result = MicroTime::diff($a,$b);
        
        $this->assertInstanceOf('Dux\MicroTimeInterval',$result);
        $this->assertEquals(1005, $result->inMs());
        $this->assertEquals(1.005, $result->inSeconds());
    }

    public function testFromString() {
        $result = MicroTime::fromString("10.1 12345");

        $this->assertInstanceOf('Dux\MicroTime',$result);
        $this->assertEquals(10.1, $result->getMs());
        $this->assertEquals(12345, $result->getSeconds());
    }
}