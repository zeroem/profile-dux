<?php

namespace Dux;

class Profile
{
    /**
     * @var \Dux\MicroTime
     */
    public $start;

    /**
     * @var \Dux\MicroTime
     */
    public $end;

    /**
     * Calculate the length of this profile in milliseconds
     *
     * @return integer
     */
    public function getElapsedMs() {
        return $this->diff()->inMs();
    }

    /**
     * Calculate the length of this profile in seconds
     *
     * @return float
     */
    public function getElapsedSeconds() {
        return $this->diff()->inSeconds();
    }

    private function diff() {
        return MicroTime::diff($this->end, $this->start);
    }
}