<?php

namespace FS\AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class ApiStoryController extends AbstractApiController
{
    /**
     * @ApiDoc(
     *      section="story",
     *      description="Stories",
     *      parameters={
     *          {
     *              "name"="page",
     *              "required"=false,
     *              "dataType"="integer",
     *              "description"="pagination default page is one",
     *          },
     *          {
     *              "name"="limit",
     *              "required"=false,
     *              "dataType"="integer",
     *              "description"="pagination default limit is ten",
     *          },
     *      },
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function listAction(Request $request)
    {
        $user = $this->getUser();

        $page = $request->query->get('page', 1);
        $limit = $request->query->get('limit', 10);

        $listContainer = $this
            ->get('fs.stoty.data.provider')
            ->getListContainer($page, $limit, $user);

        return $this->createSuccessListContainer($listContainer);
    }

    /**
     * @ApiDoc(
     *      section="story",
     *      description="Like",
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function likeAction($id)
    {

    }

    /**
     * @ApiDoc(
     *      section="story",
     *      description="Unlike",
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function unlikeAction($id)
    {

    }
}
