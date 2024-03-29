<?php

$dir = explode(DIRECTORY_SEPARATOR,__DIR__);
$dir=$dir[count($dir) - 1];

return [
    "app" => [
        "name" => $_ENV["APP_NAME"] ?? null,
        "url" => $_ENV["APP_URL"] ?? $dir
    ],
    "database" => [
        'DB_HOST' => $_ENV["DB_HOST"],
        "DB_NAME" => $_ENV["DB_NAME"],
        "DB_USERNAME" => $_ENV["DB_USERNAME"],
        "DB_PASSWORD" => $_ENV["DB_PASSWORD"],
    ]
];
