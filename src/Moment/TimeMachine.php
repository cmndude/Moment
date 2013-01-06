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
}
