<?php

date_default_timezone_set("Europe/Tallinn");

define('ENVIRONMENT', 'dev');

if (ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/** Your site full url */
define('URL', "http://localhost/mvc/");

/** Configuration for: Database */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mvc');
define('DB_USER', 'mvc');
define('DB_PASS', 'mvcpass');
define('DB_CHARSET', 'utf8');

/** Users rights */

define('MODUSERS', array(
    '3'
));

define('MODPAGES', array(
    '1',
    '2'
));

define('MODPRODUCTS', array(
    '1'
));