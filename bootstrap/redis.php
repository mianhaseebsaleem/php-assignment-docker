<?php

use Predis\Client;

// Create a new Predis client instance
$redis = new Client([
    'scheme' => 'tcp', // Redis server protocol (tcp or unix)
    'host'   => '127.0.0.1', // Redis server hostname or IP address
    'port'   => 6380, // Redis server port
    // Add any other configuration options as needed
]);

// Return the Predis client
return $redis;
