<?php

namespace Tests\FS\AppBundle\Controller;

class ApiActivityControllerTest extends AbstractApiControllerTest
{
    public function testAny()
    {
        $client = static::createClient();

        $container = static::$kernel->getContainer();

        $repository = $container
            ->get('doctrine')
            ->getRepository('FSAppBundle:UserActivity');

        $activity = $repository->find(3);

        $this->assertSame(null, $activity);

        $client->request('GET', '/api/stories.json', [
            'token' => 3
        ]);

        $activity = $repository->find(3);
        $this->assertNotSame(null, $activity);
        $this->assertSame(3, $activity->getUserId());

        $this->expectSuccessStatus($client);
    }
}
