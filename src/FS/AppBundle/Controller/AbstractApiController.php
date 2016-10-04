<?php

namespace FS\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class AbstractApiController extends Controller
{
    protected function createSuccess(array $data)
    {
        return new JsonResponse([
            'data' => $data,
            'success' => true,
        ]);
    }

    /**
     * @return \FS\AppBundle\Entity\User|null
     */
    protected function getUser()
    {
        return $this
            ->get('doctrine')
            ->getRepository('FSAppBundle:User')
            ->find(1);
    }
}
