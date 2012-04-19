<?php

namespace Dux;

class MicroTimeInterval
{
    private $seconds;
    private $ms;

    public function __construct($seconds, $ms) {
        $this->seconds = $seconds;
        $this->ms = $ms;
    }

    /**
     * Return the elapsed time in seconds
     * @return float
     */
    public function inSeconds() {
        return $this->seconds + ($this->ms / 1000);
    }

    /**
     * Return the elapsed time in milliseconds
     * @return integer
     */
    public function inMs() {
        return $this->ms + ($this->seconds * 1000);
    }
}