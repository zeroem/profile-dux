<?php

namespace Dux\Test\Aggregate;

use Dux\Aggregate\Mode;
use Dux\Profile;

class ModeTest extends \PHPUnit_Framework_TestCase
{
    public function testMode() {
        $mode = new Mode();

        $this->assertTrue(is_nan($mode->getAggregateValue()));

        $mode->processProfile($this->mockProfile(1));
        $value = $mode->getAggregateValue();
        $this->assertInternalType('array',$value);
        $this->assertArrayHasKey("1",$value);
        $this->assertEquals(1,$value[1]);

        $mode->processProfile($this->mockProfile(2));
        $value = $mode->getAggregateValue();
        $this->assertArrayHasKey("1",$value);
        $this->assertArrayHasKey("2",$value);
        $this->assertEquals(1,$value[1]);
        $this->assertEquals(1,$value[2]);

        $mode->processProfile($this->mockProfile(1));
        $value = $mode->getAggregateValue();
        $this->assertArrayHasKey("1",$value);
        $this->assertEquals(2,$value[1]);
    }

    private function mockProfile($elapsed) {
        $result = $this->getMock("\Dux\Profile");
        $result->expects($this->once())
               ->method("getElapsedMs")
               ->will($this->returnValue($elapsed));

        return $result;
    }
}
