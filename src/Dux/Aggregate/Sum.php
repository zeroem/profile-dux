<?php

namespace Dux\Aggregate;

use Dux\Profile;

class Sum implements AggregateInterface
{
    private $sum=0;

    public function processProfile(Profile $prof) {
        $this->sum += $prof->getElapsedMs();
        return $this;
    }

    public function renderAggregate() {
        return "Total execution time: {$this->sum}ms";
    }

    public function getAggregateValue() {
        return $this->sum;
    }
}
