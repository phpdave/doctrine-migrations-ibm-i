<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use DoctrineDbalIbmi\Driver\DB2Driver;
use Symfony\Component\Console\Helper\HelperSet;

require __DIR__ . '/vendor/autoload.php';

$helper = new HelperSet([
    'db' => new ConnectionHelper(
        DriverManager::getConnection([
            'persistent' => false,
            'platform_options' => [
                'quote_identifiers' => true,
            ],
            'driverOptions' => [
                'i5_naming' => DB2_I5_NAMING_OFF,
                'i5_lib' => 'MYLIB', // set your own library
            ],
            'driverClass' => DB2Driver::class,
            'host' => 'localhost',
            'user' => 'USER', // set your own user profile
            'password' => 'PASSWORD', // set your own password
            'dbname' => '*LOCAL',
        ])
    )
]);
