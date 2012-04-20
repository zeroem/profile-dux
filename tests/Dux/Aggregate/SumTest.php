<?php

namespace Dux\Test\Aggregate;

use Dux\Aggregate\Sum;
use Dux\Profile;

class SumTest extends \PHPUnit_Framework_TestCase
{
    public function testSum() {
        $mean = new Sum();

        $this->assertEquals(0,$mean->getAggregateValue());

        $mean->processProfile($this->mockProfile(1));
        $this->assertEquals(1,$mean->getAggregateValue());

        $mean->processProfile($this->mockProfile(2));
        $this->assertEquals(3,$mean->getAggregateValue());

        $mean->processProfile($this->mockProfile(3));
        $this->assertEquals(6,$mean->getAggregateValue());
    }

    private function mockProfile($elapsed) {
        $result = $this->getMock("\Dux\Profile");
        $result->expects($this->once())
               ->method("getElapsedMs")
               ->will($this->returnValue($elapsed));

        return $result;
    }
}
