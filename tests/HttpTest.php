<?php

namespace MyFiles\Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

abstract class HttpTest extends TestCase
{
    const BASE_URI = 'https://myfiles.work';

    protected static $client;

    public static function setUpBeforeClass()
    {
        self::$client = new Client([
            'base_uri' => self::BASE_URI,
        ]);
    }
}
