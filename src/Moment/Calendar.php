<?php

namespace Moment;

class Calendar
{
    /** @var \Moment\Moment */
    private $moment;

    function __construct(Moment $moment)
    {
        $this->moment = $moment;
    }

    /**
     * @param string $type
     * @param int $value
     * @return \DateTime
     */
    function subtract($type='day',$value=1)
    {
        return $this->moment->modify('-'.$value.' '.$type);
    }

    /**
     * @param string $type
     * @param int $value
     * @return \DateTime
     */
    function add($type='day',$value=1)
    {
        return $this->moment->modify('+'.$value.' '.$type);
    }
}
