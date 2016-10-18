<?php

namespace Tests\FS\AppBundle\Controller;

class ApiActivityControllerTest extends AbstractApiControllerTest
{
    public function testAny()
    {
        $client = static::createClient();

        $client->request('GET', '/api/status.json');

        $this->expectSuccessStatus($client);
    }
}
