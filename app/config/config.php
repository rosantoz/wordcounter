<?php

function __autoload($class)
{
    $class = "../src/" . str_replace('\\', '/', $class) . ".php";
    require_once "$class";
}