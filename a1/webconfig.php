<?php
// Remove Later for Security
ini_set('display_errors',1);
error_reporting(E_ALL);

define('ABSOLUTE_PATH', "./");
// Not really an error but changed URL to the server host and correct directory path
define('URL_ROOT',"http://{$_SERVER['HTTP_HOST']}/CIT313/FA2017/a1");