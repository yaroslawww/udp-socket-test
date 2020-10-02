<?php

$configs = require __DIR__ . '/config.php';

$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);

socket_bind($socket, $configs['ip'], $configs['port']);
$clients = [];
var_dump($configs);
echo "Server started" . PHP_EOL;
while (true) {
    if (isset($configs['sleep_seconds'])) {
        sleep($configs['sleep_seconds']);
    }
    socket_recvfrom($socket, $buffer, $configs['max_buffer'], 0, $configs['ip'], $configs['port']);
    echo "Received: $buffer" . PHP_EOL;
}
