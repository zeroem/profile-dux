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

    public function inSeconds() {
        return $this->seconds + ($this->ms / 1000);
    }

    public function inMs() {
        return $this->ms + ($this->seconds * 1000);
    }
}