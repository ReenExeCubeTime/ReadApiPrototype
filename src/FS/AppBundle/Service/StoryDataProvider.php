<?php

namespace FS\AppBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use FS\AppBundle\Component\ApiListContainer;
use FS\AppBundle\Component\Pager\StoryAdapter;
use FS\AppBundle\Entity\User;
use Pagerfanta\Pagerfanta;

class StoryDataProvider
{
    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * StoryDataProvider constructor.
     * @param Registry $doctrine
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @param $page
     * @param $limit
     * @param User|null $user
     * @return ApiListContainer
     */
    public function getListContainer($page, $limit, User $user = null)
    {
        $repository = $this
            ->doctrine
            ->getRepository('FSAppBundle:Story');

        $pager = new Pagerfanta(
            new StoryAdapter($repository, new \DateTime())
        );

        $pager
            ->setCurrentPage($page)
            ->setMaxPerPage($limit);

        $source = $pager->getCurrentPageResults();

        $result = [];

        $storyIdList = array_column($source, 'id');

        $favoriteStorySourceMap = $this
            ->doctrine
            ->getRepository('FSAppBundle:UserStoryFavorite')
            ->getTotalMap($storyIdList);

        $favoriteStoryMap = array_column($favoriteStorySourceMap, 'total', 'storyId');

        $inFaveMap = $user
            ? $this->getInFaveMap($user, $storyIdList)
            : [];

        foreach ($source as $item) {
            $storyId = $item['id'];

            $result[] = [
                'id' => $storyId,
                'text' => $item['text'],
                'category' => [
                    'name' => $item['name'],
                ],
                'language' => [
                    'code' => $item['code'],
                ],
                'favorite' => [
                    'total' => isset($favoriteStoryMap[$storyId])
                        ? $favoriteStoryMap[$storyId]
                        : 0,
                    'in' => isset($inFaveMap[$storyId]),
                ],
            ];
        }

        return new ApiListContainer($result, $pager);
    }

    private function getInFaveMap(User $user, $storyIdList)
    {
        $inFaveList = $this
            ->doctrine
            ->getRepository('FSAppBundle:UserStoryFavorite')
            ->inFaveList($user, $storyIdList);

        return array_flip(array_column($inFaveList, 'storyId'));
    }
}