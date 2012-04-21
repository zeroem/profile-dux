<?php

namespace Dux\Aggregate;

use Dux\Profile;

class Median extends AbstractCountingAggregate
{
    private $median = null;

    public function processProfile(Profile $prof) {
        parent::processProfile($prof);
        
        // force recalculation of the median
        $this->median = null;
    }

    public function renderAggregate() {
        return "Median execution time: {$this->getAggregateValue()}ms";
    }

    public function getAggregateValue() {
        if(!isset($this->median)) {
            $this->median = $this->calculateMedian();
        }

        return $this->median;
    }

    private function calculateMedian() {
        $keys = array_keys($this->elements);
        sort($keys,SORT_NUMERIC);
        $count = count($keys);

        if($count > 0) {
            if(($count & 1) == 0) {
                $middle = $count/2;
                return ($keys[$middle] + $keys[$middle-1]) / 2;
            } else {
                return $keys[floor($count/2)];
            }
        } else {
            return NAN;
        }
    }
}
