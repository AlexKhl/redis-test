<?php

use PHPUnit\Framework\TestCase as TestCase;
use PHPUnit\Framework\AssertTest;
use Reaktion\Throttle;

class ThrottleTest extends TestCase
{
    private $Throttle;
    protected function setUp(): void
    {
        parent::setUp();
        Throttle::$redis = new Redis();
        Throttle::$redis->pconnect('127.0.0.1');
        $this->Throttle = new Throttle('key', 'value', 3, 10);
    }

    public function testAttempt()
    {

    }

    public function test__construct()
    {
        AssertTest::assertNotNull(Throttle::$redis);
        AssertTest::assertEquals($this->Throttle->getCurrentAttempts(), 0);
    }
}
