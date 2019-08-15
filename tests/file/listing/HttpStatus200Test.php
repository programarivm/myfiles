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

        $expected = [
            [
                'id' => '1',
                'name' => 'foo.txt',
                'mimetype' => 'text/plain',
                'size' => 12,
                'created_at' => '2019-01-01 00:00:00',
            ],
        ];

        $contents = json_decode($response->getBody()->getContents(), true);

        $uniqid = $contents[0]['uniqid'];
        unset($contents[0]['uniqid']);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($expected, $contents);
    }
}
