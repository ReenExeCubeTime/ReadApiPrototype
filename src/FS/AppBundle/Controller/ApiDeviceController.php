<?php

namespace FS\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ApiDeviceController extends Controller
{
    /**
     * @ApiDoc(
     *      description="Is need force update Application",
     *      requirements={
     *          {
     *              "name"="_format",
     *              "dataType"="string",
     *              "description"="response format, default json",
     *          }
     *      }
     * )
     * @return JsonResponse
     */
    public function statusAction()
    {
        return new JsonResponse([
            'version' => $this->container->getParameter('version')
        ]);
    }
}
