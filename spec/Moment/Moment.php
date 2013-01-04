<?php

namespace spec\Moment;

use PHPSpec2\ObjectBehavior;

class Moment extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Moment\Moment');
    }
}
