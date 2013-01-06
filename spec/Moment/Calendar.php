<?php

namespace spec\Moment;

use PHPSpec2\ObjectBehavior;

class Calendar extends ObjectBehavior
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
        $this->shouldHaveType('Moment\Calendar');
    }

    function it_should_subtract_from_moment($moment)
    {
        $moment->modify('-1 day')->shouldBeCalled();
        $this->subtract('day',1);
    }

    function it_should_add_to_moment($moment)
    {
        $moment->modify('+1 day')->shouldBeCalled();
        $this->add('day',1);
    }
}
