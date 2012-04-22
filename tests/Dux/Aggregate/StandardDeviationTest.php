<?php

namespace Dux\Test\Aggregate;

use Dux\Aggregate\StandardDeviation;
use Dux\Profile;

class StandardDeviationTest extends \PHPUnit_Framework_TestCase
{

    public function testStandardDeviation() {
        // example data taken from http://en.wikipedia.org/wiki/Standard_deviation
        $population = array(2,4,4,4,5,5,7,9);

        $stddev = new StandardDeviation();
        foreach($population as $member) {
            $stddev->processProfile($this->mockProfile($member));
        }

        $this->assertEquals(2,$stddev->getAggregateValue());
    }
    
    private function mockProfile($elapsed) {
        $result = $this->getMock("\Dux\Profile");
        $result->expects($this->exactly(2))
               ->method("getElapsedMs")
               ->will($this->returnValue($elapsed));

        return $result;
    }
}