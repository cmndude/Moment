<?php

namespace spec;

use PHPSpec2\ObjectBehavior;

class DateConverter extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('DateConverter');
    }
}
