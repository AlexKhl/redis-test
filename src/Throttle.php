<?php
namespace Reaktion;

// https://github.com/phpredis/phpredis
use Redis;
use Exception;

class Throttle
{
    /**
     * @var Redis
     */
    public static Redis $redis;
    /**
     * @var integer
     */
    private int $attempts;
    /**
     * @var integer
     */
    private int $current_attempts;

    public function __construct($key, $value, $attempts, $interval)
    {
        if (self::$redis == null){
            self::$redis = new Redis();
            self::$redis->pconnect('127.0.0.1');
        }
        self::$redis->setEx($key, $interval, $value);
        $this->current_attempts = 0;
        $this->attempts = $attempts;
        $this->attempt();
    }

    public function attempt()
    {
        if ($this->current_attempts > $this->attempts) $this->ThrottleException();
        $this->incrementAttempts();

        // some code here for using the instance of this class
    }

    private function ThrottleException()
    {
        throw new Exception("The attempts are no longer available");
    }

    private function incrementAttempts() : void
    {
        $this->current_attempts = $this->current_attempts+1;
    }

    /**
     * @return int
     */
    public function getCurrentAttempts(): int
    {
        return $this->current_attempts;
    }
}