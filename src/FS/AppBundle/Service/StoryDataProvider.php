<?php

namespace FS\AppBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use FS\AppBundle\Entity\User;

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

    public function getList(User $user = null)
    {
        $source = $this
            ->doctrine
            ->getRepository('FSAppBundle:Story')
            ->getList(new \DateTime());

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

        return $result;
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