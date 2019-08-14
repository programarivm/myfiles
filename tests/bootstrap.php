<?php

namespace MyFiles\Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use MyFiles\Utils\DB;
use MyFiles\Utils\Filesystem;

define('APP_PATH', realpath(dirname(__FILE__) . '/../'));

$dotenv = \Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

Filesystem::rmDir(APP_PATH.'/storage');

$sql = file_get_contents(APP_PATH.'/docker/mysql/database.sql');

DB::getInstance()->multiQuery($sql);
