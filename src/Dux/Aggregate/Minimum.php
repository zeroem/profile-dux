<?php

namespace Dux\Aggregate;

use Dux\Profile;

class Minimum implements AggregateInterface
{
    private $min=NAN;

    public function processProfile(Profile $prof) {
        $duration = $prof->getElapsedMs();
        
        if($duration < $this->min) {
            $this->min = $duration;
        }
        return $this;
    }

    public function renderAggregate() {
        return "Longest execution time: {$this->min}ms";
    }

    public function getAggregateValue() {
        return $this->min;
    }
}
