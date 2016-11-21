<?php

return [
    'settings' => [
        'displayErrorDetails' => false, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'orderdb',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__.'/../../app/Views/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__.'/../../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
