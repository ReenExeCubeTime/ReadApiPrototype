<?php

namespace FS\AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiStoryController extends AbstractApiController
{
    public function listAction()
    {
        return $this->createSuccess([]);
    }
}
