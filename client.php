<?php
$configs = require __DIR__ . '/config.php';

$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);

array_shift($argv);
$text = (string)array_shift($argv);

$text = substr($text, 0, $configs['max_buffer']);


socket_sendto($socket, $text, strlen($text), 0, $configs['ip'], $configs['port']);

echo socket_last_error() . PHP_EOL;
