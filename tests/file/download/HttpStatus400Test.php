<?php

namespace MyFiles\Tests\File\Download;

use MyFiles\Tests\HttpTest;

class HttpStatus400Test extends HttpTest
{
    /**
     * @test
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function http_status_400()
    {
        $response = self::$client->get('file/download/foo');
    }
}
