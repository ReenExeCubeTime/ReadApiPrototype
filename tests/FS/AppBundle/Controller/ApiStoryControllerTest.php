<?php

namespace Tests\FS\AppBundle\Controller;

class ApiStoryControllerTest extends AbstractApiControllerTest
{
    /**
     * @dataProvider dataProvider
     * @param array $parameters
     * @param array $list
     * @param array $paging
     */
    public function testList(array $parameters, array $list, array $paging)
    {
        $client = static::createClient();

        $client->request('GET', '/api/stories.json', $parameters);

        $this->expectSuccessStatus($client);
        $this->expectSuccessList(
            $list,
            $paging,
            $client
        );
    }

    public function dataProvider()
    {
        return [
            [
                [],
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
                            'in' => false,
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
                    [
                        'id' => 4,
                        'text' => 'Funny',
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
                    [
                        'id' => 5,
                        'text' => 'Little',
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
                [
                    'page' => 1,
                    'pages' => 1,
                    'limit' => 10,
                    'total' => 5,
                ],
            ],
            [
                [
                    'limit' => 3,
                ],
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
                            'in' => false,
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
                [
                    'page' => 1,
                    'pages' => 2,
                    'limit' => 3,
                    'total' => 5,
                ],
            ]
        ];
    }
}
