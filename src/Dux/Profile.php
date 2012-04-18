<?php

namespace Dux;

class Profile
{
    public $start;
    public $end;

    public function getElapsedMs() {
        return $this->diff()->inMs();
    }

    public function getElapsedSeconds() {
        return $this->diff()->inSeconds();
    }

    private function diff() {
        return MicroTime::diff($this->end, $this->start);
    }
}