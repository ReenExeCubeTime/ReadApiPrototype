<?php

namespace Tests\FS\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class AbstractApiControllerTest extends WebTestCase
{
    protected function expectSuccessStatus(Client $client)
    {
        $this->assertTrue($client->getResponse()->isOk());
    }

    protected function expectSuccess(array $expect, Client $client)
    {
        $this->assertEquals(
            [
                'data' => $expect,
                'success' => true,
            ],
            json_decode($client->getResponse()->getContent(), true)
        );
    }

    protected function expectSuccessList(array $expect, array $paging, Client $client)
    {
        $this->assertEquals(
            [
                'paging' => $paging,
                'data' => $expect,
                'success' => true,
            ],
            json_decode($client->getResponse()->getContent(), true)
        );
    }
}
