<?php

namespace Dux\Aggregate;

use Dux\Profile;

abstract class AbstractCountingAggregate implements AggregateInterface
{
    protected $elements = array();

    public function processProfile(Profile $prof) {
        $duration = $prof->getElapsedMs();

        if(!isset($this->elements[$duration])) {
            $this->elements[$duration] = 0;
        }

        $this->elements[$duration]++;

        return $this;
    }
}