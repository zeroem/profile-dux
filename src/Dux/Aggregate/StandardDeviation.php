<?php

namespace Dux\Aggregate;

use Dux\Profile;

class StandardDeviation extends AbstractCountingAggregate
{
    private $mean;
    private $standardDeviation;

    public function __construct() {
        $this->mean = new Mean();
    }

    public function processProfile(Profile $profile) {
        parent::processProfile($profile);
        $this->mean->processProfile($profile);
        $this->standardDeviation = null;
    }

    public function getAggregateValue() {
        if(!isset($this->standardDeviation)) {
            $this->standardDeviation = $this->calculateStandardDeviation();
        }

        return $this->standardDeviation;
    }

    private function calculateStandardDeviation() {
        $mean = $this->mean->getAggregateValue();
        $sum_of_squares = 0;
        foreach($this->elements as $duration=>$count) {
            $sum_of_squares += pow($mean - $duration,2) * $count;
        }

        return sqrt($sum_of_squares / $this->mean->getCount());
    }

    public function renderAggregate() {
        return "Standard Deviation: {$this->getAggregateValue()}";
    }
}
