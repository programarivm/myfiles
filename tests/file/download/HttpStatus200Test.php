<?php

namespace MyFiles\Tests\File\Download;

use MyFiles\Tests\HttpTest;

class HttpStatus200Test extends HttpTest
{
    /**
     * @test
     * @dataProvider data
     */
    public function http_status_200($id)
    {
        $response = self::$client->get("file/download/$id");

        $contents = $response->getBody()->getContents();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/octet-stream', $response->getHeaders()['Content-Type'][0]);
        $this->assertEquals('Binary', $response->getHeaders()['Content-Transfer-Encoding'][0]);
        $this->assertEquals('attachment; filename="foo.txt"', $response->getHeaders()['Content-disposition'][0]);
    }

    public function data()
    {
        $data = [];
        $queryStrings = json_decode(file_get_contents(__DIR__ . '/data/http_status_200.json'))->queryString;
        foreach ($queryStrings as $queryString) {
            $data[] = [
                $queryString->id,
            ];
        }

        return $data;
    }
}
