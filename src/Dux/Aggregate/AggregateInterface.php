<?php

namespace Dux\Aggregate;

use Dux\Profile;

interface AggregateInterface
{
    function processProfile(Profile $prof);
    function renderAggregate();
    function getAggregateValue();
}