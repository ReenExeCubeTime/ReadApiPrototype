<?php

namespace Tests\FS\AppBundle\Controller;

class ApiStoryControllerTest extends AbstractApiControllerTest
{
    public function testList()
    {
        $client = static::createClient();

        $client->request('GET', '/api/stories.json');

        $this->expectSuccessStatus($client);
        $this->expectSuccess(
            [
                [
                    'id' => 1,
                    'text' => 'First Story',
                    'category' => [
                        'name' => 'History',
                    ],
                ]
            ],
            $client
        );
    }
}
