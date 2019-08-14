<?php

namespace MyFiles\Tests\File\Listing;

use MyFiles\Tests\HttpTest;

class HttpStatus200Test extends HttpTest
{
    /**
     * @test
     */
    public function http_status_200()
    {
        $response = self::$client->get('file/listing');

        $expected = json_encode([
            [
                'id' => '1',
                'name' => 'foo.txt',
                'mimetype' => 'text/plain',
                'created_at' => '2019-01-01 00:00:00',
            ],
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($expected, $response->getBody()->getContents());
    }
}
