<?php

namespace Moment;
use Moment\Calendar;

class Moment extends \DateTime
{

    function __construct($dateTime = 'now', $format = 'YYYYMMDD', $timezone='UTC')
    {
        parent::__construct($dateTime, new \DateTimeZone($timezone));
        parent::format($format);

        return $this;
    }

    /**
     * @param null $format
     * @return string
     */
    function format($format = NULL)
    {
        if(is_null($format)) $format = parent::ISO8601;
        return parent::format($format);
    }

    function subtract()
    {
        $c = new Calendar($this);
        $c->calendar();
    }
}
