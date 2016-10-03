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
        $list = $this
            ->doctrine
            ->getRepository('FSAppBundle:Story')
            ->getList();

        $result = [];

        foreach ($list as $item) {
            $result[] = [
                'id' => $item['id'],
                'text' => $item['text'],
                'category' => [
                    'name' => $item['name'],
                ],
            ];
        }

        return $result;
    }
}