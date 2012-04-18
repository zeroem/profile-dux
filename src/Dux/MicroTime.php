<?php

namespace Dux;

class MicroTime
{
    private $seconds;
    private $ms;

    public function __construct($seconds, $ms=null) {
        if(func_num_args() == 1) {
            $time = $seconds;
            if(is_string($time)) {
                list($this->seconds, $this->ms) = explode(" ", $time);
            } else {
                throw new \InvalidArgumentException(
                    "Expected string, got " . gettype($time)
                );
            }
        } else {
            $this->seconds = $seconds;
            $this->ms = $ms;
        }
    }

    public function getSeconds() {
        return $this->seconds;
    }

    public function getMs() {
        return $this->ms;
    }

    public function inSeconds() {
        return $this->seconds + ($this->ms / 1000);
    }

    public function inMs() {
        return $this->ms + ($this->seconds * 1000);
    }
}