<?php

namespace FS\AppBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;

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

    public function getList()
    {
        $source = $this
            ->doctrine
            ->getRepository('FSAppBundle:Story')
            ->getList();

        $result = [];

        $storyIdList = array_column($source, 'id');

        $favoriteStorySourceMap = $this
            ->doctrine
            ->getRepository('FSAppBundle:UserStoryFavorite')
            ->getStoryTotalMap($storyIdList);

        $favoriteStoryMap = array_column($favoriteStorySourceMap, null, 'storyId');

        foreach ($source as $item) {
            $storyId = $item['id'];

            $result[] = [
                'id' => $storyId,
                'text' => $item['text'],
                'category' => [
                    'name' => $item['name'],
                ],
                'favorite' => [
                    'total' => isset($favoriteStoryMap[$storyId])
                        ? $favoriteStoryMap[$storyId]['total']
                        : 0,
                ],
            ];
        }

        return $result;
    }
}