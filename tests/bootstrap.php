<?php

error_reporting(-1);
define('APPLICATION_PATH', '../app/src/');

// Autoload
function testAutoload($class)
{
    $class = APPLICATION_PATH . str_replace('\\', '/', $class) . '.php';

    if (file_exists($class)) {
        require_once $class;
    }
}

spl_autoload_register('testAutoload');
