<?php

require_once __DIR__ . '/../vendor/autoload.php';

define('APP_PATH', realpath(dirname(__FILE__) . '/../'));

$dotenv = \Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

switch (true) {
    case substr($_SERVER['REQUEST_URI'], 0, 15) === '/file/download/':
        require_once APP_PATH.'/src/file/download.php';
    case $_SERVER['REQUEST_URI'] === '/file/listing':
        require_once APP_PATH.'/src/file/listing.php';
    case $_SERVER['REQUEST_URI'] === '/file/upload':
        require_once APP_PATH.'/src/file/upload.php';
}

exit;
