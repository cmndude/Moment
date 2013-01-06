<?php

namespace spec\Moment;

use PHPSpec2\ObjectBehavior;

class Moment extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith($dateTime='now', $format='Y-m-d', $timezone='UTC');
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

    function it_should_return_year()
    {
        $this->format('Y')->shouldReturn('2013');
    }

    /**
     * @param \Moment\Calendar $calendar
     */
    function it_should_call_calendar($calendar)
    {
        $calendar->calendar()->shouldBeCalled();

        $this->subtract();
    }
}
