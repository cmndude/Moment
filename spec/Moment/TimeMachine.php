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
}
