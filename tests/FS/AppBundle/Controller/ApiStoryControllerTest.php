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
                    'language' => [
                        'code' => 'uk',
                    ],
                    'favorite' => [
                        'total' => 3,
                        'in' => true,
                    ],
                ],
                [
                    'id' => 2,
                    'text' => 'Memory Story',
                    'category' => [
                        'name' => 'History',
                    ],
                    'language' => [
                        'code' => 'uk',
                    ],
                    'favorite' => [
                        'total' => 1,
                        'in' => false,
                    ],
                ],
                [
                    'id' => 3,
                    'text' => 'Try Story',
                    'category' => [
                        'name' => 'History',
                    ],
                    'language' => [
                        'code' => 'uk',
                    ],
                    'favorite' => [
                        'total' => 0,
                        'in' => false,
                    ],
                ],
            ],
            $client
        );
    }
}
