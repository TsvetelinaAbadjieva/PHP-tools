<?php
define('DEVELOPMENT', true);
if (defined('DEVELOPMENT') && DEVELOPMENT === true)
{
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$routes = [
  '/file/upload/' => 'file.upload'
];
print_r($routes);
