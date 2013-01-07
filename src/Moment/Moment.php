<?php

namespace Moment;

class Moment extends \DateTime
{

    /** @var \Moment\Calendar */
    private $calendar;

    /** @var \Moment\TimeMachine */
    private $timeMachine;

    /**
     * @param string $dateTime
     * @param string $format
     * @param string $timezone
     */
    function __construct($dateTime = 'now', $format = 'Y-m-d', $timezone='UTC')
    {
        parent::__construct($dateTime, new \DateTimeZone($timezone));
        parent::format($format);

        $this->calendar     = new Calendar($this);
        $this->timeMachine  = new TimeMachine($this);
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

    /**
     * Re-init the parent object with clean default settings
     */
    function clear()
    {
        // TODO: this most probably could be improved
        parent::__construct($dateTime = 'now', $this->getTimezone());
    }

    /**
     * @return \DateInterval
     */
    function fromNow()
    {
        return $this->timeMachine->diff(new \DateTime('now', $this->getTimezone()));
    }

    /**
     * @param string $type
     * @return \DateInterval
     */
    function startOf($type='day')
    {
        return $this->timeMachine->startOf($type)->diff(new \DateTime('now', $this->getTimezone()));
    }

    /**
     * @param string $type
     * @return \DateInterval
     */
    function endOf($type='day')
    {
        return $this->timeMachine->endOf($type)->diff(new \DateTime('now', $this->getTimezone()));
    }
}
