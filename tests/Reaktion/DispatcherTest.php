<?php

namespace Reaktion;

use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertIsArray;

class DispatcherTest extends TestCase
{

    /**
     * @var array
     */
    private array $test_throttles;
    /**
     * @var Dispatcher
     */
    private Dispatcher $dispatcher;

    public function setUp(): void
    {
        parent::setUp();
        $this->test_throttles = [
            ['key1', 'value', 10, 3600],
            ['key2', 'value', 10, 3600]
        ];
        $this->dispatcher = new Dispatcher();
    }

    public function testHandle()
    {
        $this->dispatcher->handle($this->test_throttles);
        assertIsArray($this->dispatcher->getThrottles());
    }
}
