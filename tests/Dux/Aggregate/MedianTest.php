<?php

namespace Dux\Test\Aggregate;

use Dux\Aggregate\Median;
use Dux\Profile;

class MedianTest extends \PHPUnit_Framework_TestCase
{
    public function testMedian() {
        $median = new Median();

        $this->assertTrue(is_nan($median->getAggregateValue()));

        $median->processProfile($this->mockProfile(1));
        $this->assertEquals(1,$median->getAggregateValue());

        $median->processProfile($this->mockProfile(2));
        $this->assertEquals(1.5,$median->getAggregateValue());

        $median->processProfile($this->mockProfile(3));
        $this->assertEquals(2,$median->getAggregateValue());
    }

    private function mockProfile($elapsed) {
        $result = $this->getMock("\Dux\Profile");
        $result->expects($this->once())
               ->method("getElapsedMs")
               ->will($this->returnValue($elapsed));

        return $result;
    }
}
