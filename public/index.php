<?php

require_once __DIR__ . '/../vendor/autoload.php';

define('APP_PATH', realpath(dirname(__FILE__) . '/../'));

$dotenv = \Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

switch (true) {
    case '/file/delete/' === substr($_SERVER['REQUEST_URI'], 0, 13):
        require_once APP_PATH.'/src/file/delete.php';
    case '/file/download/' === substr($_SERVER['REQUEST_URI'], 0, 15):
        require_once APP_PATH.'/src/file/download.php';
    case '/file/listing' === $_SERVER['REQUEST_URI'] :
        require_once APP_PATH.'/src/file/listing.php';
    case '/file/upload' === $_SERVER['REQUEST_URI'] :
        require_once APP_PATH.'/src/file/upload.php';
}

exit;
