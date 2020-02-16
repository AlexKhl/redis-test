<?php
require __DIR__ . '/vendor/autoload.php';

use Reaktion\Throttle;
use Reaktion\Dispatcher;

Throttle::$redis = new Redis();
Throttle::$redis->pconnect('127.0.0.1');

$throttles = [
    ['key1', 'value', 10, 3600],
    ['key2', 'value', 10, 3600],
    ['key3', 'value', 10, 3600],
    ['key4', 'value', 10, 3600],
    ['key5', 'value', 10, 3600],
    ['key6', 'value', 10, 3600],
    ['key7', 'value', 10, 3600],
    ['key8', 'value', 10, 3600],
];

// Here is the part with any instances of Throttle class

$dispatcher = new Dispatcher();
$dispatcher->handle($throttles);