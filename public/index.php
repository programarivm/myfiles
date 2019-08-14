<?php

require_once __DIR__ . '/../vendor/autoload.php';

define('APP_PATH', realpath(dirname(__FILE__) . '/../'));

$dotenv = \Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

switch ($_SERVER['REQUEST_URI']) {
    case '/file/listing':
        require_once APP_PATH.'/src/file/listing.php';
    case '/file/upload':
        require_once APP_PATH.'/src/file/upload.php';
}

exit;
