<?php

namespace Dux\Aggregate;

use Dux\Profiler;

class Report
{
    static public function processProfiler(Profiler $prof, AggregateInterface $agg) {
        foreach($this->profiler->getProfiles() as $profile) {
            $this->aggregator->processProfile($profile);
        }

        return $agg;
    }
}
