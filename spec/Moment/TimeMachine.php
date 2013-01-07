<?php

namespace spec\Moment;

use PHPSpec2\ObjectBehavior;

class TimeMachine extends ObjectBehavior
{
    /**
     * @param \Moment\Moment $moment
     */
    function let($moment)
    {
        $this->beConstructedWith($moment);
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Moment\TimeMachine');
    }

    /**
     * @param \Moment\Moment $moment
     * @param \DateTime $dateTime
     * @param $interval
     * @return void
     */
    function it_should_get_diff_date_interval($moment, $dateTime, $interval)
    {
        $moment->diff($dateTime)->willReturn($interval);
        $this->diff($dateTime);
    }

    /**
     * @param \Moment\Moment $moment
     * @param \DateTime $dateTime
     */
    function it_should_clear_time_before_getting_elapsed_interval($moment, $dateTime)
    {
        $moment->clear()->shouldBeCalled();
        $this->startOf()->diff($dateTime);
    }

    /**
     * @param \Moment\Moment $moment
     * @param \DateTime $dateTime
     */
    function it_should_get_elapsed_interval_for_day($moment, $dateTime)
    {
        $moment->setTime(0,0,0)->shouldBeCalled();
        $this->startOf('day')->diff($dateTime);
    }

    /**
     * @param \Moment\Moment $moment
     * @param \DateTime $dateTime
     */
    function it_should_get_elapsed_interval_for_hour($moment, $dateTime)
    {
        $moment->format('H')->willReturn('23');
        $moment->setTime(23,0,0)->shouldBeCalled();
        $this->startOf('hour')->diff($dateTime);
    }

    /**
     * @param \Moment\Moment $moment
     * @param \DateTime $dateTime
     */
    function it_should_get_elapsed_interval_for_minute($moment, $dateTime)
    {
        $moment->format('H')->willReturn('23');
        $moment->format('i')->willReturn('45');
        $moment->setTime(23,45,0)->shouldBeCalled();
        $this->startOf('minute')->diff($dateTime);
    }

    /**
     * @param \Moment\Moment $moment
     * @param \DateTime $dateTime
     */
    function it_should_get_remaining_interval_for_day($moment, $dateTime)
    {
        $moment->modify('+1 day')->shouldBeCalled();
        $moment->setTime(0,0,0)->shouldBeCalled();
        $this->endOf('day')->diff($dateTime);
    }

    /**
     * @param \Moment\Moment $moment
     * @param \DateTime $dateTime
     */
    function it_should_get_remaining_interval_for_hour($moment, $dateTime)
    {
        $moment->format('H')->willReturn('23');
        $moment->modify('+1 hour')->shouldBeCalled();
        $moment->setTime(23,0,0)->shouldBeCalled();
        $this->endOf('hour')->diff($dateTime);
    }

    /**
     * @param \Moment\Moment $moment
     * @param \DateTime $dateTime
     */
    function it_should_get_remaining_interval_for_minute($moment, $dateTime)
    {
        $moment->format('H')->willReturn('23');
        $moment->format('i')->willReturn('45');
        $moment->modify('+1 minutes')->shouldBeCalled();
        $moment->setTime(23,45,0)->shouldBeCalled();
        $this->endOf('minute')->diff($dateTime);
    }
}
