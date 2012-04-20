<?php

namespace Dux\Aggregate;

use Dux\Profile;

class GroupAggregate implements AggregateInterface
{
    private $aggregates = array();

    public function addAggregate(AggregateInterface $agg) {
        array_push($this->aggregates, $agg);
        return $this;
    }

    public function processProfile(Profile $prof) {
        foreach($this->aggregates as $agg) {
            $agg->processProfile($prof);
        }
        return $this;
    }

    public function renderAggregate() {
        $result = "";
        foreach($this->aggregates as $agg) {
            $result .= $agg->renderAggregate() . "\n";
        }

        return $result;
    }

    public function getAggregateValue() {
        $result = array();
        foreach($this->aggregates as $agg) {
            $result[get_class($agg)] = $agg->getAggregateValue();
        }

        return $result;
    }

    public function getAggregates() {
        return $this->aggregates;
    }
}
