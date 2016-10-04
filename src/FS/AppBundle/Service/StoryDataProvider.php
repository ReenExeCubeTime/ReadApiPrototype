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

    public function getList(User $user)
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

        $inFaveList = $this
            ->doctrine
            ->getRepository('FSAppBundle:UserStoryFavorite')
            ->inFaveList($user, $storyIdList);

        $inFaveMap = array_flip(array_column($inFaveList, 'storyId'));

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
}