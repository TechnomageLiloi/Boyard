<?php

error_reporting(0);

define('ROOT_DIR', __DIR__);

try {
    session_start();
    include_once ROOT_DIR . '/vendor/autoload.php';

    $config = include ROOT_DIR . '/Config/Block.php';
    echo (new Liloi\Rune\Application($config))->compile();
}
catch(Throwable $e)
{
    echo $e->getMessage();
}
