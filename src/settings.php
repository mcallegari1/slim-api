<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        'db' => [
            'driver' => 'mysql',
            'host'   => 'localhost',
            'database' => 'slim',
            'username' => 'root',
            'password' => 'g8p6e5w8',
            'charset'  => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ],

        // Secret key
        'secretKey' => '71b13b663533896cf543c564289f1ab41d254df3'
    ],
];
