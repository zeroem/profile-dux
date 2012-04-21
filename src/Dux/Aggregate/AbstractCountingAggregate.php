<?php

namespace Dux\Aggregate;

use Dux\Profile;

abstract class AbstractCountingAggregate implements AggregateInterface
{
    protected $elements = array();

    public function processProfile(Profile $prof) {
        // NOTE: We must make the key a string.
        // Floats get cast to ints when used as array keys.  As such
        // any value < 1 gets cast to 0
        $duration = "{$prof->getElapsedMs()}";

        if(!isset($this->elements[$duration])) {
            $this->elements[$duration] = 0;
        }

        $this->elements[$duration]++;

        return $this;
    }
}