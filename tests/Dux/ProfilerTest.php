<?php

namespace Dux\Test;

use Dux\Profiler;

class ProfilerTest extends \PHPUnit_Framework_TestCase
{
    public function testProfiler() {
        $prof = new Profiler();

        $prof->start();
        $this->assertCount(0,$prof->getProfiles());
        $prof->end();
        $this->assertCount(1,$prof->getProfiles());

        $this->assertInstanceOf("Dux\Profile", current($prof->getProfiles()));
    }
}