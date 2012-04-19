<?php

namespace Dux;

class Profiler
{
    private $stack = array();
    private $profiles = array();

    /**
     * Begin a new profiler level
     *
     * @param string $time result of microtime.  If not passed, microtime will be called internally
     * @return Profiler
     */
    public function start($time=null) {
        if(!isset($time)) {
            $time = microtime();
        }

        $profile = new Profile();
        $profile->start = new MicroTime($time);
        array_push($this->stack,$profile);

        return $this;
    }

    /**
     * End the newest profiling level
     *
     * @param string $time result of microtime.  If not passed, microtime will be called internally
     * @return Profiler
     */
    public function end($time=null) {
        if(!isset($time)) {
            $time = microtime();
        }

        $profile = array_pop($this->stack);
        $profile->stop = new MicroTime($time);
        array_push($this->profiles,$profile);

        return $this;
    }
    
    /**
     * End any remaining profiler levels
     *
     * @param string $time result of microtime.  If not passed, microtime will be called internally
     * @return Profiler
     */
    public function halt($time = null) {
        if(!empty($this->stack)) {
            if(!isset($time)) {
                $time = microtime();
            }

            while(!empty($this->stack)) {
                $this->end($time);
            }
        }

        return $this;
    }

    /**
     * A lower level combination of start and end.
     *
     * Intended to allow use of the profiler to keep track of
     * the profiling data without the overhead of multiple function calls
     *
     * @param string $start microtime result from the start of the profiling
     * @param string $end microtime result from the end of the profiling
     * @return Profiler
     */
    public function addProfile($start,$end) {
        $profile = new Profile();
        $profile->start = new MicroTime($start);
        $profile->end = new MicroTime($end);

        array_push($this->profiles, $profile);
        return $this;
    }
    
    public function getProfiles() {
        return $this->profiles;
    }
}
