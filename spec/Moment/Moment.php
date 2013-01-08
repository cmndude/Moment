<?php

namespace spec\Moment;

use PHPSpec2\ObjectBehavior;

class Moment extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('2012-01-31', 'Y-m-d');
        $time = new \DateTime('2012-01-02 13:15:45');
        timecop_freeze($time->getTimestamp());
    }

    function letgo()
    {
        timecop_return();
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Moment\Moment');
    }

    function it_should_be_possible_to_construct_with_custom_time_and_format()
    {
        $this->calendar()->shouldBe('2012-01-31');
    }

    function it_should_add_one_day_to_moment()
    {
        $this->add('day', 1)->calendar()->shouldBe('2012-02-01');
    }

    function it_should_remove_one_day_from_moment()
    {
        $this->subtract('day', 1)->calendar()->shouldBe('2012-01-30');
    }

    function it_should_return_cloned_object_of_current_moment()
    {
        $this->add('day', 1);
        $this->add('day', 1)->calendar()->shouldBe('2012-02-01');
    }

    function it_should_return_time_passed_since_start_of_day()
    {
        $moment = $this->startOf('day')->fromNow();
        $moment->format('%H:%I:%S')->shouldBe('13:15:45');
    }

    function it_should_return_time_passed_since_start_of_hour()
    {
        $moment = $this->startOf('hour')->fromNow();
        $moment->format('%H:%I:%S')->shouldBe('00:15:45');
    }

    function it_should_return_time_passed_since_start_of_minute()
    {
        $moment = $this->startOf('minute')->fromNow();
        $moment->format('%H:%I:%S')->shouldBe('00:00:45');
    }

    function it_should_return_time_that_will_pass_since_start_of_day()
    {
        $moment = $this->endOf('day')->fromNow();
        $moment->format('%H:%I:%S')->shouldBe('10:44:15');
    }

    function it_should_return_time_that_will_pass_since_start_of_hour()
    {
        $moment = $this->endOf('hour')->fromNow();
        $moment->format('%H:%I:%S')->shouldBe('00:44:15');
    }

    function it_should_return_time_that_will_pass_since_start_of_minute()
    {
        $moment = $this->endOf('minute')->fromNow();
        $moment->format('%H:%I:%S')->shouldBe('00:00:15');
    }

    function it_should_return_time_from_default_moment()
    {
        $moment = $this->fromNow();
        $moment->format('%H:%I:%S')->shouldBe('10:44:15');
    }
}
