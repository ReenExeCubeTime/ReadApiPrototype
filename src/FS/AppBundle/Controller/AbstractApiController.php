<?php

namespace FS\AppBundle\Controller;

use FS\AppBundle\Component\ApiListContainer;
use Pagerfanta\Pagerfanta;
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

    protected function createSuccessListContainer(ApiListContainer $container)
    {
        return $this->createSuccessList(
            $container->getList(),
            $container->getPager()
        );
    }

    protected function createSuccessList(array $list, Pagerfanta $pager)
    {
        return new JsonResponse([
            'paging' => [
                'page' => $pager->getCurrentPage(),
                'pages' => $pager->getNbPages(),
                'limit' => $pager->getMaxPerPage(),
                'total' => $pager->getNbResults(),
            ],
            'data' => $list,
            'success' => true,
        ]);
    }
}
