<?php

namespace Dux;

class MicroTime
{
    /**
     * @var integer
     */
    private $seconds;

    /**
     * @var integer
     */
    private $ms;

    /**
     * Constructs a object representation of microtime data using either
     * the default string format of micro time or seconds and ms offset
     *
     * @param string|int $seconds either a microtime string or the number of seconds since the Unix Epoch
     * @param integer $ms milliseconds offset from $seconds
     */
    public function __construct($seconds, $ms=null) {
        if(func_num_args() == 1) {
            $time = $seconds;
            if(is_string($time)) {
                list($this->ms, $this->seconds) = explode(" ", $time);
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

    /**
     * Return a MicroTimeInterval representing the amount of time
     * elapsed between two MicroTime Objects
     *
     * @param \Dux\MicroTime $end
     * @param \Dux\MicroTime $start
     * @return \Dux\MicroTimeInterval
     */
    static public function diff(MicroTime $end, MicroTime $start) {
        return new MicroTimeInterval(
            $end->getSeconds() - $start->getSeconds(),
            $end->getMs() - $start->getMs()
        );
    }
}