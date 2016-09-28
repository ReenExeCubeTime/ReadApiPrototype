<?php

namespace Tests\FS\AppBundle\Controller;

class ApiCategoryControllerTest extends AbstractApiControllerTest
{
    public function testList()
    {
        $client = static::createClient();

        $client->request('GET', '/api/categories.json');

        $this->expectSuccessStatus($client);
        $this->expectSuccess(
            [
                [
                    'id' => 1,
                    'name' => 'History',
                ]
            ],
            $client
        );
    }
}
