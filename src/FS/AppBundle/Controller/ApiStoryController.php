<?php

namespace FS\AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ApiStoryController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *      section="story",
     *      description="Stories"
     * )
     * @return JsonResponse
     */
    public function listAction()
    {
        $stories = $this
            ->getDoctrine()
            ->getRepository('FSAppBundle:Story')
            ->getList();

        return $this->createSuccess($stories);
    }
}
