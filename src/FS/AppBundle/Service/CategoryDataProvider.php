<?php

namespace FS\AppBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;

class CategoryDataProvider
{
    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * CategoryDataProvider constructor.
     * @param Registry $doctrine
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getList()
    {
        return $this
            ->doctrine
            ->getRepository('FSAppBundle:Category')
            ->getList();
    }
}
