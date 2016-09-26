<?php

namespace FS\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiDeviceController extends Controller
{
    public function statusAction()
    {
        return new JsonResponse([
            'version' => $this->container->getParameter('version')
        ]);
    }
}
