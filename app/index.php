<?php
/// TODO Install Script
//- choose another database platform
//- choose db name (default is oauth)
//- import db test data

if (!file_exists(__DIR__ . '/vendor/autoload.php'))
    throw new \RuntimeException( "Unable to load Module.\n"
        . "- Type `composer install`; to install library dependencies.\n"
    );

if (! file_exists('/docker/initialized') )
    throw new \RuntimeException( "Initializing .....\n");


require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/vendor/poirot/skeleton/index.php';
