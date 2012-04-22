<?php

namespace Dux\Aggregate;

use Dux\Profile;

class Mean implements AggregateInterface
{
    private $mean=0;
    private $count=0;

    public function processProfile(Profile $prof) {
        $this->count++;
        $this->mean = $this->mean - ($this->mean - $prof->getElapsedMs()) / $this->count;
        return $this;
    }

    public function renderAggregate() {
        return "Mean execution time: {$this->mean}ms";
    }

    public function getAggregateValue() {
        return $this->mean;
    }

    public function getCount() {
        return $this->count;
    }
}
