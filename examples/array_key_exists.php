<?php

require_once(__DIR__.'/../vendor/.composer/autoload.php');

$data = range(0,1000);

$profiler = new \Dux\Profiler();

for($i=0; $i < 10000; $i++) {
    $start = microtime();
    array_key_exists(5,$data);
    $end = microtime();
    $profiler->addProfile($start,$end);
}

$aggregate = new \Dux\Aggregate\GroupAggregate();
$aggregate->addAggregate(new \Dux\Aggregate\Maximum());
$aggregate->addAggregate(new \Dux\Aggregate\Minimum());
$aggregate->addAggregate(new \Dux\Aggregate\Mean());
$aggregate->addAggregate(new \Dux\Aggregate\StandardDeviation());
$aggregate->addAggregate(new \Dux\Aggregate\Median());
$aggregate->addAggregate(new \Dux\Aggregate\Mode());
$aggregate->addAggregate(new \Dux\Aggregate\Sum());

echo \Dux\Aggregate\Report::generate($profiler,$aggregate)->renderAggregate();
