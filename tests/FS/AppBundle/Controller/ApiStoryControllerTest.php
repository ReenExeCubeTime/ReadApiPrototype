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
                    'text' => 'Good morning Story',
                    'category' => [
                        'name' => 'History',
                    ],
                    'favorite' => [
                        'total' => 3,
                    ],
                ],
                [
                    'id' => 2,
                    'text' => 'Memory Story',
                    'category' => [
                        'name' => 'History',
                    ],
                    'favorite' => [
                        'total' => 1,
                    ],
                ],
                [
                    'id' => 3,
                    'text' => 'Try Story',
                    'category' => [
                        'name' => 'History',
                    ],
                    'favorite' => [
                        'total' => 0,
                    ],
                ],
            ],
            $client
        );
    }
}
