<?php

namespace spec\Moment;

use PHPSpec2\ObjectBehavior;

class Moment extends ObjectBehavior
{

    /**
     * @param string $dateTime
     * @param string $format
     */
    function let($dateTime, $format)
    {
        $this->beConstructedWith($dateTime='now', $format='YYYYMMDD');
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

    function it_should_be_able_to_set_timezone()
    {
        $this->setTimeZone(new \DateTimeZone('Europe/Madrid'));
        $tz = $this->getTimeZone();
        $tz->getName()->shouldReturn('Europe/Madrid');
    }
}
