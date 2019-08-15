<?php

namespace MyFiles\Tests\File\Space;

use MyFiles\Tests\HttpTest;

class HttpStatus200Test extends HttpTest
{
    /**
     * @test
     */
    public function http_status_200()
    {
        $response = self::$client->get('file/space');

        $expected = [
            'used' => '12',
        ];

        $contents = json_decode($response->getBody()->getContents(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($expected, $contents);
    }
}
