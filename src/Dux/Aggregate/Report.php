<?php

namespace Dux\Aggregate;

use Dux\Profiler;

class Report
{
    static public function generate(Profiler $profiler, AggregateInterface $aggregator) {
        foreach($profiler->getProfiles() as $profile) {
            $aggregator->processProfile($profile);
        }

        return $aggregator;
    }
}
