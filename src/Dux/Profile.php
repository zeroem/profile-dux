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
        return new MicroTime(
            $this->end->getSeconds() - $this->start->getSeconds(),
            $this->end->getMs() - $this->start->getMs()
        );
    }

}