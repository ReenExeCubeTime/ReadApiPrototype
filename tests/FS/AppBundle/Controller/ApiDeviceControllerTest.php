<?php

namespace Tests\FS\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;
use Symfony\Component\HttpFoundation\Response;

class ApiDeviceControllerTest extends WebTestCase
{
    public function testStatus()
    {
        $client = static::createClient();

        $client->request('GET', '/api/status.json');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertResponseData(
            [
                'version' => 1,
            ],
            $client
        );
    }

    private function assertResponseData($expect, Client $client)
    {
        $this->assertEquals($expect, json_decode($client->getResponse()->getContent(), true));
    }
}
