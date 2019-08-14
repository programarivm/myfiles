<?php

namespace MyFiles\Tests\File\Download;

use MyFiles\Tests\HttpTest;

class HttpStatus200Test extends HttpTest
{
    /**
     * @test
     */
    public function http_status_200()
    {
        $response = self::$client->get('file/download/1');

        $contents = $response->getBody()->getContents();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/octet-stream', $response->getHeaders()['Content-Type'][0]);
        $this->assertEquals('Binary', $response->getHeaders()['Content-Transfer-Encoding'][0]);
        $this->assertEquals('attachment; filename="foo.txt"', $response->getHeaders()['Content-disposition'][0]);
    }
}
