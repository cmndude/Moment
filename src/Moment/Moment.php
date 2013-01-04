<?php

namespace Moment;

class Moment extends \DateTime
{
    function __construct($dateTime = 'now', $format = 'YYYYMMDD')
    {
        parent::__construct($dateTime, new \DateTimeZone('UTC'));
        parent::format($format);

        return $this;
    }
}
