<?php

namespace Dux\Aggregate;

use Dux\Profile;

class Mode extends AbstractCountingAggregate
{
    private $mode = null;

    public function processProfile(Profile $prof) {
        parent::processProfile($prof);
        
        // force recalculation of the mode
        $this->mode = null;

        return $this;
    }

    public function renderAggregate() {
        $mode = $this->getAggregateValue();
        $count = current($mode);
        $keys = implode(", ", array_keys($mode));
        return "Mode execution time({$count}): {$keys}";
    }

    public function getAggregateValue() {
        if(!isset($this->mode)) {
            $this->mode = $this->calculateMode();
        }

        return $this->mode;
    }

    private function calculateMode() {
        if(count($this->elements) > 0) {
            arsort($this->elements,SORT_NUMERIC);
            $max_count = current($this->elements);
            $result = array();

            foreach($this->elements as $time=>$count) {
                if($count == $max_count) {
                    $result["{$time}"] = $count;
                } else {
                    break;
                }
            }

            return $result;
        } else {
            return NAN;
        }
    }
}
