<?php

namespace Dux\Test;

use Dux\MicroTime;
class MicroTimeTest extends \PHPUnit_Framework_TestCase
{
    public function testSingleArgConstructor() {
        $s = 1;
        $ms = 2;

        $mt = new MicroTime("{$s} {$ms}");
        $this->assertEquals($s, $mt->getSeconds());
        $this->assertEquals($ms, $mt->getMs());
    }

    public function testTwoArgConstructor() {
        $s = 1;
        $ms = 2;

        $mt = new MicroTime($s,$ms);
        $this->assertEquals($s, $mt->getSeconds());
        $this->assertEquals($ms, $mt->getMs());
    }

    public function testDiff() {
        $a = new MicroTime(10,5);
        $b = new MicroTime(9,0);

        $result = MicroTime::diff($a,$b);
        
        $this->assertInstanceOf('Dux\MicroTimeInterval',$result);
        $this->assertEquals(1005, $result->inMs());
        $this->assertEquals(1.005, $result->inSeconds());
    }
}