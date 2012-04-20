<?php

namespace Dux\Aggregate;

use Dux\Profile;

interface AggregateInterface
{

    /**
     * Incorporate the profile data into the aggregate
     *
     * @param Profile $prof
     * @return AggregateInterface
     */
    function processProfile(Profile $prof);

    /**
     * Render a string representation of the aggregate data
     *
     * @return string
     */
    function renderAggregate();

    /**
     * Retrieve the numeric portion of the aggregate only
     *
     * @return mixed
     */
    function getAggregateValue();
}