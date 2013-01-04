<?php

namespace Moment;

class Moment extends \DateTime
{
    function __construct($dateTime = 'now', $timezone = 'UTC')
    {
        parent::__construct($dateTime, new \DateTimeZone($timezone));

        return $this;
    }
}
