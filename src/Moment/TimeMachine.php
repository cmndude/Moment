<?php

namespace Moment;

use DateTime;

class TimeMachine
{
    /**
     * @var Moment
     */
    private $moment;

    function __construct(Moment $moment)
    {
        $this->moment = $moment;
    }

    /**
     * @param \DateTime $dateTime
     * @return \DateInterval
     */
    function diff(DateTime $dateTime)
    {
        return $this->moment->diff($dateTime);
    }

    /**
     * @param string $type
     * @return Moment
     */
    function startOf($type='day')
    {
        $this->moment->clear();
        switch($type) {
            case 'day':
                $this->moment->setTime(0,0,0);
                break;
            case 'hour':
                $this->moment->setTime($this->moment->format('H'), 0, 0);
                break;
            case 'minute':
                $this->moment->setTime($this->moment->format('H'), $this->moment->format('i'), 0);
                break;

        }
        return $this->moment;
    }

    function endOf($type='day')
    {
        return $this;
    }
}
