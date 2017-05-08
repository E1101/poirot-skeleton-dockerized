<?php
/** @see \Poirot\Std\Environment\EnvBase */

define('PT_DIR_DATA', '/data/poirot');
define('PT_DIR_WWW', '/var/www/html');
define('PT_DIR_CONFIG', constant('PT_DIR_WWW').'/config');
define('PT_DIR_THEME_DEFAULT', constant('PT_DIR_WWW').'/theme_alter');

return array(
    #'defined_const' => array(
        #'PT_DIR_DATA'          => '/data/poirot',
        #'PT_DIR_WWW'           => '/var/www/html',
        #'PT_DIR_THEME_DEFAULT' => '/var/www/html/theme/alter/',
    #),
);
