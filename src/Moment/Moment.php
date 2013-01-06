<?php

namespace Moment;

class Moment extends \DateTime
{

    /** @var \Moment\Calendar */
    private $calendar;

    /**
     * @param string $dateTime
     * @param string $format
     * @param string $timezone
     */
    function __construct($dateTime = 'now', $format = 'Y-m-d', $timezone='UTC')
    {
        parent::__construct($dateTime, new \DateTimeZone($timezone));
        parent::format($format);

        $this->calendar = new Calendar($this);
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

    /**
     * @return Calendar
     */
    function calendar()
    {
        return $this->calendar;
    }

    function clear()
    {
        self::__construct();
    }
}
