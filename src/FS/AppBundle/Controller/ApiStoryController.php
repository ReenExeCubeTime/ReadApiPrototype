<?php

namespace FS\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiStoryController extends Controller
{
    public function listAction()
    {
        return new JsonResponse([]);
    }
}
