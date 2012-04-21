<?php

namespace Dux\Test\Aggregate;

use Dux\Aggregate\Minimum;
use Dux\Profile;

class MinimumTest extends \PHPUnit_Framework_TestCase
{
    public function testMinimum() {
        $min = new Minimum();

        $this->assertTrue(is_nan($min->getAggregateValue()));

        $min->processProfile($this->mockProfile(3));
        $this->assertEquals(3,$min->getAggregateValue());

        $min->processProfile($this->mockProfile(1));
        $this->assertEquals(1,$min->getAggregateValue());

        $min->processProfile($this->mockProfile(2));
        $this->assertEquals(1,$min->getAggregateValue());
    }

    private function mockProfile($elapsed) {
        $result = $this->getMock("\Dux\Profile");
        $result->expects($this->once())
               ->method("getElapsedMs")
               ->will($this->returnValue($elapsed));

        return $result;
    }
}
