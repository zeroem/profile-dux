# Profile - Doesn't Use Xdebug
A simple object oriented profiling tool

# Usage

## Normal Usage
```php
$profiler = new \Dux\Profiler();

for($i=0; $i < $n; $i++) {
    $profiler->start();
    // do something that you want proifled
    $profiler->end();
}

\Dux\Aggregate\Report::generate(
    $profiler, 
    new \Dux\Aggregate\Mean()
)->renderAggregate();

// Outputs:
// Mean execution time: (mean)ms
```

## Special Circumstances
When profiling sub-millisecond execution times, the overhead of the method calls can greatly impact your profiling results.  To combat this, simply generate the microtime values and add them to the profiler after execution.

NOTE: Only use `microtime()`, not `microtime(true)`.  Floating point numbers lose precision as they get larger.  To deal with this, profile-dux makes use of the string representation of microtime which separates the millisecond offset from the Unix timestamp.

```php
$profiler = new \Dux\Profiler();

for($i=0; $i < $n; $i++) {
    $start = microtime();
    // do something that you want proifled
    $end = microtime();
    $profiler->addProfile($start,$end);
}
```




# Installation
Simply add `zeroem/profile-dux` to your Composer requirements:

```json
"require": {
    "zeroem/profile-dux":"*"
}
```

and install your dependencies:

```shell
$> php composer.phar install
```
