<?php
namespace Reaktion;

use Reaktion\Throttle;

class Dispatcher
{
    /**
     * @var array
     */
    private array $throttles;

    public function handle(array $throttles) : void
    {
        foreach ($throttles as $params) {
            $this->throttles[$params[0]] = new Throttle($params[0], $params[1], $params[2], $params[3]);
        }
    }

    /**
     * @return array
     */
    public function getThrottles(): array
    {
        return $this->throttles;
    }
}