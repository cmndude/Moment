<?php

namespace Moment;

class Calendar
{
    private $moment;

    function __construct(Moment $moment)
    {
        $this->moment = $moment;
    }

    /**
     * @param string $type
     * @param int $value
     * @return Calendar
     */
    function subtract($type='day',$value=1)
    {
        $this->moment->modify('-'.$value.' '.$type);

        return $this;
    }

    /**
     * @param string $type
     * @param int $value
     * @return Calendar
     */
    function add($type='day',$value=1)
    {
        $this->moment->modify('+'.$value.' '.$type);
        return $this;
    }
}
