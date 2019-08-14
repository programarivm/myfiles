<?php

namespace MyFiles\Tests\File\Delete;

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

        $this->assertEquals(200, $response->getStatusCode());
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
