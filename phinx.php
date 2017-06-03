<?php

namespace MyConfig;

$databaseConfig = include __DIR__ . "/dbConfig.php";

$adapter	= $databaseConfig['database.adapter'];
$host	    = $databaseConfig['database.host'];
$name	    = $databaseConfig['database.name'];
$user	    = $databaseConfig['database.user'];
$pass	    = $databaseConfig['database.pass'];
$port	    = $databaseConfig['database.adapter'];
$charset	= $databaseConfig['database.charset'];

$config = [
    "paths"          => [
        "migrations"    => __DIR__ . "/db/migrations",
        "seeds"         => __DIR__ . "/db/seeds",
    ],
    "environments"  => [
        'development'   => [
            'adapter'   => $adapter,
            'host'      => $host,
            'name'      => $name,
            'user'      => $user,
            'pass'      => $pass,
            'port'      => $port,
            'charset'   => $charset,
        ],
    ],
];

return $config;
