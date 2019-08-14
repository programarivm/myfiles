<?php

namespace MyFiles\Tests\File\Download;

use MyFiles\Tests\HttpTest;

class HttpStatus404Test extends HttpTest
{
    /**
     * @test
     * @dataProvider data
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function http_status_404($id)
    {
        $response = self::$client->get("file/download/$id");
    }

    public function data()
    {
        $data = [];
        $queryStrings = json_decode(file_get_contents(__DIR__ . '/data/http_status_404.json'))->queryString;
        foreach ($queryStrings as $queryString) {
            $data[] = [
                $queryString->id,
            ];
        }

        return $data;
    }
}
