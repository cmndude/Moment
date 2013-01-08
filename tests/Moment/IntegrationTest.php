<?php
require __DIR__ . "/../../vendor/autoload.php";

use Moment\Moment;

class IntegrationTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Moment\Moment */
    private $moment;

    function setUp()
    {
        $this->moment = new Moment('2012-01-01');
        // freeze time
        $time = new \DateTime('2012-01-01 13:15:45');
        timecop_freeze($time->getTimestamp());
    }

    function tearDown()
    {
        timecop_return();
    }

    /**
     * @test
     */
    function checkDate()
    {
        $this->assertEquals('2012-01-01', $this->moment->calendar());
    }

    /**
     * @test
     */
    function addDays()
    {
        $this->assertEquals('2012-01-10', $this->moment->add('day', 9)->calendar());
    }

    /**
     * @test
     */
    function subtractDays()
    {
        $this->assertEquals('2011-12-30', $this->moment->subtract('day', 2)->calendar());
    }

    /**
     * @test
     */
    function checkStartOfDay()
    {
        $this->assertEquals('13:15:45', $this->moment->startOf('day')->fromNow()->format('%H:%I:%s'));
    }

    /**
     * @test
     */
    function checkStartOfHour()
    {
        $this->assertEquals('00:15:45', $this->moment->startOf('hour')->fromNow()->format('%H:%I:%s'));
    }

    /**
     * @test
     */
    function checkStartOfMinute()
    {
        $this->assertEquals('00:00:45', $this->moment->startOf('minute')->fromNow()->format('%H:%I:%s'));
    }

    /**
     * @test
     */
    function checkEndOfDay()
    {
        $this->assertEquals('10:44:15', $this->moment->endOf('day')->fromNow()->format('%H:%I:%s'));
    }

    /**
     * @test
     */
    function checkEndOfHour()
    {
        $this->assertEquals('00:44:15', $this->moment->endOf('hour')->fromNow()->format('%H:%I:%s'));
    }

    /**
     * @test
     */
    function checkEndOfMinute()
    {
        $this->assertEquals('00:00:15', $this->moment->endOf('minute')->fromNow()->format('%H:%I:%s'));
    }
}