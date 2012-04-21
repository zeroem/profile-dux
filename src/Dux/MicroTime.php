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
    public function __construct($seconds, $ms=0) {
        $this->seconds = $seconds;
        $this->ms = $ms;
    }

    public function getSeconds() {
        return $this->seconds;
    }

    public function getMs() {
        return $this->ms;
    }

    static public function fromString($str) {
        $parts = explode(" ", $str);

        return new MicroTime($parts[1], $parts[0]);
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