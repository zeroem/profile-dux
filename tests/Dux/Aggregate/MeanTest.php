<?php

namespace Dux\Test\Aggregate;

use Dux\Aggregate\Mean;
use Dux\Profile;

class MeanTest extends \PHPUnit_Framework_TestCase
{
    public function testMean() {
        $mean = new Mean();

        $this->assertEquals(0,$mean->getAggregateValue());

        $mean->processProfile($this->mockProfile(1));
        $this->assertEquals(1,$mean->getAggregateValue());

        $mean->processProfile($this->mockProfile(2));
        $this->assertEquals(1.5,$mean->getAggregateValue());

        $mean->processProfile($this->mockProfile(3));
        $this->assertEquals(2,$mean->getAggregateValue());
    }

    private function mockProfile($elapsed) {
        $result = $this->getMock("\Dux\Profile");
        $result->expects($this->once())
               ->method("getElapsedMs")
               ->will($this->returnValue($elapsed));

        return $result;
    }
}
