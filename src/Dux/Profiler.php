<?php

namespace Dux;

class Profiler
{
    private $stack = array();
    private $profiles = array();

    public function start($time=null) {
        if(!isset($time)) {
            $time = microtime();
        }

        $profile = new Profile();
        $profile->start = new MicroTime($time);
        array_push($this->stack,$profile);

        return $this;
    }

    public function end($time=null) {
        if(!isset($time)) {
            $time = microtime();
        }

        $profile = array_pop($this->stack);
        $profile->stop = new MicroTime($time);
        array_push($this->profiles,$profile);
    }

    public function halt($time = null) {
        if(!empty($this->stack)) {
            if(!isset($time)) {
                $time = microtime();
            }

            while(!empty($this->stack)) {
                $this->end($time);
            }
        }
    }

    public function addProfile($start,$stop) {
        $profile = new Profile();
        $profile->start = new MicroTime($start);
        $profile->end = new MicroTime($stop);

        array_push($this->profiles, $profile);
        return $this;
    }
    
    public function getProfiles() {
        return $this->profiles;
    }
}
