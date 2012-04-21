<?php

namespace Dux\Test\Aggregate;

use Dux\Aggregate\Maximum;
use Dux\Profile;

class MaximumTest extends \PHPUnit_Framework_TestCase
{
    public function testMaximum() {
        $max = new Maximum();

        $this->assertTrue(is_nan($max->getAggregateValue()));

        $max->processProfile($this->mockProfile(1));
        $this->assertEquals(1,$max->getAggregateValue());

        $max->processProfile($this->mockProfile(3));
        $this->assertEquals(3,$max->getAggregateValue());

        $max->processProfile($this->mockProfile(2));
        $this->assertEquals(3,$max->getAggregateValue());
    }

    private function mockProfile($elapsed) {
        $result = $this->getMock("\Dux\Profile");
        $result->expects($this->once())
               ->method("getElapsedMs")
               ->will($this->returnValue($elapsed));

        return $result;
    }
}
