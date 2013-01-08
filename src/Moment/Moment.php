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
    private $momentModifier;

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
     * @param int $value
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
     * @param int $value
     * @return Moment
     */
    public function subtract($type='day',$value)
    {
        $newMoment = clone $this->moment;
        $newMoment->modify('-'.$value.' '.$type);
        return new self($newMoment->format($this->format));
    }


    /**
     * @param string $type
     * @return Moment
     */
    public function startOf($type='day')
    {
        $this->momentModifier = function($moment) use ($type) {
            /** @var \DateTime $moment */
            switch($type)
            {
                case 'day':
                    $moment->setTime(0,0,0);
                    break;
                case 'hour':
                    $moment->setTime($moment->format('H'),0,0);
                    break;
                case 'minute':
                    $moment->setTime($moment->format('H'),$moment->format('i'),0);
                    break;
                default:
                    break;
            }
        };
        return $this;
    }

    /**
     * @param string $type
     * @return Moment
     */
    public function endOf($type='day')
    {
        $this->momentModifier = function($moment) use ($type) {
            /** @var \DateTime $moment */
            switch($type)
            {
                case 'day':
                    $moment->setTime(0,0,0);
                    $moment->modify('+1 day');
                    break;
                case 'hour':
                    $moment->setTime($moment->format('H'),0,0);
                    $moment->modify('+1 hour');
                    break;
                case 'minute':
                    $moment->setTime($moment->format('H'),$moment->format('i'),0);
                    $moment->modify('+1 minutes');
                    break;
                default:
                    break;
            }
        };
        return $this;
    }

    /**
     * @return \DateInterval
     */
    public function fromNow()
    {
        $now = new \DateTime;
        $newMoment = clone $now;
        if(is_object($this->momentModifier) && ($this->momentModifier instanceof \Closure)) {
            call_user_func($this->momentModifier, $newMoment);
        } else {
            $newMoment = $this->moment;
        }
        return $now->diff($newMoment);
    }
}
