<?php


return [
    'host' => env('RABBITMQ_HOST', 'rabbitmq'),
    'user' => env('RABBITMQ_USER', 'guest'),
    'pass' => env('RABBITMQ_PASSWORD', 'guest'),
    'vhost' => env('RABBITMQ_VHOST', '/'),
    'port' => env('RABBITMQ_VHOST', '5672'),
];