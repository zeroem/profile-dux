<?php

namespace Dux\Aggregate;

use Dux\Profile;

class Maximum implements AggregateInterface
{
    private $max=NAN;

    public function processProfile(Profile $prof) {
        $duration = $prof->getElapsedMs();
        
        if($duration > $this->max) {
            $this->max = $duration;
        }
        return $this;
    }

    public function renderAggregate() {
        return "Maximum execution time: {$this->max}ms";
    }

    public function getAggregateValue() {
        return $this->max;
    }
}
