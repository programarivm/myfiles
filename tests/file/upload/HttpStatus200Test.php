<?php

namespace MyFiles\Tests\File\Upload;

use GuzzleHttp\RequestOptions;
use MyFiles\Tests\HttpTest;

class HttpStatus200Test extends HttpTest
{
    /**
     * @test
     */
    public function http_status_200()
    {
        $fileContent = file_get_contents(__DIR__.'/data/http_status_200/foo.txt');

        $response = self::$client->post('file/upload.php');

        $expected = '{"message":"Success"}';

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($expected, $response->getBody()->getContents());
    }
}
