<?php

namespace Tests\FS\AppBundle\Controller;

class ApiDeviceControllerTest extends AbstractApiControllerTest
{
    public function testStatus()
    {
        $client = static::createClient();

        $client->request('GET', '/api/status.json');

        $this->expectSuccessStatus($client);
        $this->expectSuccess(
            ['version' => 1],
            $client
        );
    }
}
