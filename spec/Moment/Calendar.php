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
}
