<?php

namespace FS\AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ApiCategoryController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *      section="category",
     *      description="Categories"
     * )
     * @return JsonResponse
     */
    public function listAction()
    {
        $categories = $this
            ->getDoctrine()
            ->getRepository('FSAppBundle:Category')
            ->getList();

        return $this->createSuccess($categories);
    }
}
