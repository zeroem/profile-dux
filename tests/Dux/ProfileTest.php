<?php

namespace Dux\Test;

use Dux\Profile;
use Dux\MicroTime;

class ProfileTest extends \PHPUnit_Framework_TestCase
{
    public function testProfile() {
        $prof = new Profile();
        $prof->start = new MicroTime(5,5);
        $prof->end = new MicroTime(10,10);

        $this->assertEquals(5005,$prof->getElapsedMs());
        $this->assertEquals(5.005,$prof->getElapsedSeconds());
    }
}