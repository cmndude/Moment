<?php

namespace Moment;

class Moment
{

    /**
     * @var \DateTime
     */
    private $moment;

    /**
     * @var string
     */
    private $format;

    /**
     * @var \Closure
     */
    //private $momentModifier;

    /**
     * @param string $dateTime
     * @param string $format
     */
    function __construct($dateTime = 'now', $format = 'Y-m-d')
    {
        $this->format = $format;
        $this->moment = new \DateTime($dateTime);
    }

    /**
     * @return string
     */
    public function calendar()
    {
        return $this->moment->format($this->format);
    }

    /**
     * @param string $type
     * @param $value
     * @return Moment
     */
    public function add($type='day',$value)
    {
        $newMoment = clone $this->moment;
        $newMoment->modify('+'.$value.' '.$type);
        return new self($newMoment->format($this->format));
    }

    /**
     * @param string $type
     * @return Moment
     */
    public function startOf($type='day')
    {
//        $this->momentModifier = function($moment) use ($type) {
//            /** @var \DateTime $moment */
//            $moment->setTime(0,0,0);
//        };
        $this->momentModify($type, $this->moment);
        return $this;
    }

    /**
     * @return \DateInterval
     */
    public function fromNow()
    {
        $now = new \DateTime;
        $newMoment = clone $now;
        //call_user_func($this->momentModifier, $newMoment);
        $this->momentModify('day', $newMoment);
        return $now->diff($newMoment);
    }

    /**
     * @param $type
     * @param \DateTime $moment
     * @return Moment
     */
    private function momentModify($type, $moment)
    {
        $moment->setTime(0,0,0);
        return $this;
    }
}
