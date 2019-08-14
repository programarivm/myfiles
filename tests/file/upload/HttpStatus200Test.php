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
        $filepath = __DIR__.'/data/http_status_200/foo.txt';
        $fileContent = file_get_contents($filepath);

        $response = self::$client->post('file/upload', [
            'multipart' => [
                [
                    'name'     => 'myfile',
                    'filename' => basename($filepath),
                    'Mime-Type'=> mime_content_type($filepath),
                    'contents' => $fileContent,
                ],
            ]
        ]);

        $expected = '{"message":"Success"}';

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($expected, $response->getBody()->getContents());
    }
}
