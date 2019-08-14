<?php

namespace MyFiles\Tests\File\Download;

use MyFiles\Tests\HttpTest;

class HttpStatus404Test extends HttpTest
{
    /**
     * @test
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function http_status_404()
    {
        $response = self::$client->get('file/download/1234567890');
    }
}
