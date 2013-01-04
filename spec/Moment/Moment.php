<?php

namespace spec\Moment;

use PHPSpec2\ObjectBehavior;

class Moment extends ObjectBehavior
{

    /**
     * @param string $dateTime
     * @param string $timezone
     */
    function let($dateTime, $timezone)
    {
        $this->beConstructedWith($dateTime='now', $timezone='UTC');
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Moment\Moment');
    }

    function it_should_be_instance_of_datetime_class()
    {
        $this->shouldBeAnInstanceOf('DateTime');
    }

    function it_should_have_utc_timezone_by_default()
    {
        $tz = $this->getTimeZone();
        $tz->getName()->shouldReturn('UTC');
    }
}
