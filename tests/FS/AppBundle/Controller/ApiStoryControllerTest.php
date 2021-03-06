<?php

namespace Tests\FS\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

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
        $one = $this->getFirstStory();

        $two = $this->getSecondStory();

        $three = $this->getThirdStory();

        $four = [
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
        ];

        $five = [
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
        ];

        yield [
            [],
            [
                $one,
                $two,
                $three,
                $four,
                $five,
            ],
            [
                'page' => 1,
                'pages' => 1,
                'limit' => 10,
                'total' => 5,
            ],
        ];

        yield [
            [
                'limit' => 3,
            ],
            [
                $one,
                $two,
                $three,
            ],
            [
                'page' => 1,
                'pages' => 2,
                'limit' => 3,
                'total' => 5,
            ],
        ];

        yield [
            [
                'page' => 1,
                'limit' => 3,
            ],
            [
                $one,
                $two,
                $three,
            ],
            [
                'page' => 1,
                'pages' => 2,
                'limit' => 3,
                'total' => 5,
            ],
        ];

        yield [
            [
                'page' => 2,
                'limit' => 3,
            ],
            [
                $four,
                $five,
            ],
            [
                'page' => 2,
                'pages' => 2,
                'limit' => 3,
                'total' => 5,
            ],
        ];

        $one['favorite']['in'] = true;
        $two['favorite']['in'] = false;
        $three['favorite']['in'] = false;

        yield [
            [
                'page' => 1,
                'limit' => 3,
                'token' => 1,
            ],
            [
                $one,
                $two,
                $three,
            ],
            [
                'page' => 1,
                'pages' => 2,
                'limit' => 3,
                'total' => 5,
            ],
        ];

        $one['favorite']['in'] = true;
        $two['favorite']['in'] = true;
        $three['favorite']['in'] = false;

        yield [
            [
                'page' => 1,
                'limit' => 3,
                'token' => 2,
            ],
            [
                $one,
                $two,
                $three,
            ],
            [
                'page' => 1,
                'pages' => 2,
                'limit' => 3,
                'total' => 5,
            ],
        ];
    }

    public function testAnonymousLike()
    {
        $client = static::createClient();

        $client->request('POST', '/api/story/1/like.json');

        $this->assertSame(
            Response::HTTP_UNAUTHORIZED,
            $client->getResponse()->getStatusCode()
        );
    }

    public function testLike()
    {
        $client = static::createClient();

        $parameters = [
            'token' => 3,
            'page' => 1,
            'limit' => 3,
        ];

        $paging = [
            'page' => 1,
            'pages' => 2,
            'limit' => 3,
            'total' => 5,
        ];

        $client->request('GET', '/api/stories.json', $parameters);

        $this->expectSuccessList(
            [
                $this->getFirstStory(true),
                $this->getSecondStory(),
                $this->getThirdStory(),
            ],
            $paging,
            $client
        );

        $client->request('POST', '/api/story/3/like.json', [
            'token' => 3
        ]);

        $this->expectSuccessStatus($client);
        $this->expectSuccessAction($client);

        /**
         * double try - expect success
         */
        $client->request('POST', '/api/story/3/like.json', [
            'token' => 3
        ]);

        $this->expectSuccessStatus($client);
        $this->expectSuccessAction($client);

        $client->request('GET', '/api/stories.json', $parameters);

        $this->expectSuccessList(
            [
                $this->getFirstStory(true),
                $this->getSecondStory(),
                $this->getThirdStory(true, 1),
            ],
            $paging,
            $client
        );

        $client->request('POST', '/api/story/3/unlike.json', [
            'token' => 3
        ]);

        $this->expectSuccessStatus($client);
        $this->expectSuccessAction($client);

        $client->request('GET', '/api/stories.json', $parameters);
        $this->expectSuccessList(
            [
                $this->getFirstStory(true),
                $this->getSecondStory(),
                $this->getThirdStory(),
            ],
            $paging,
            $client
        );
    }

    /**
     * @param bool|false $in
     * @return array
     */
    private function getFirstStory($in = false)
    {
        return [
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
                'in' => $in,
            ],
        ];
    }

    /**
     * @param bool|false $in
     * @return array
     */
    private function getSecondStory($in = false)
    {
        return [
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
                'in' => $in,
            ],
        ];
    }

    /**
     * @param bool|false $in
     * @param int $total
     * @return array
     */
    private function getThirdStory($in = false, $total = 0)
    {
        return [
            'id' => 3,
            'text' => 'Try Story',
            'category' => [
                'name' => 'History',
            ],
            'language' => [
                'code' => 'uk',
            ],
            'favorite' => [
                'total' => $total,
                'in' => $in,
            ],
        ];
    }
}
