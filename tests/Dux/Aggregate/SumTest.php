<?php

namespace Dux\Test\Aggregate;

use Dux\Aggregate\Sum;
use Dux\Profile;

class SumTest extends \PHPUnit_Framework_TestCase
{
    public function testSum() {
        $sum = new Sum();

        $this->assertEquals(0,$sum->getAggregateValue());

        $sum->processProfile($this->mockProfile(1));
        $this->assertEquals(1,$sum->getAggregateValue());

        $sum->processProfile($this->mockProfile(2));
        $this->assertEquals(3,$sum->getAggregateValue());

        $sum->processProfile($this->mockProfile(3));
        $this->assertEquals(6,$sum->getAggregateValue());
    }

    private function mockProfile($elapsed) {
        $result = $this->getMock("\Dux\Profile");
        $result->expects($this->once())
               ->method("getElapsedMs")
               ->will($this->returnValue($elapsed));

        return $result;
    }
}
