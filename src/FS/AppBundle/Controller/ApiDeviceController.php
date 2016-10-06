<?php

namespace FS\AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ApiDeviceController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *      section="device",
     *      description="Is need force update Application",
     *      requirements={
     *          {
     *              "name"="_format",
     *              "dataType"="string",
     *              "description"="response format, default json",
     *          },
     *      },
     * )
     * @return JsonResponse
     */
    public function statusAction()
    {
        return $this->createSuccess([
            'version' => $this->container->getParameter('version')
        ]);
    }
}
