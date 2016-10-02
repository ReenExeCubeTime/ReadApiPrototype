<?php

namespace FS\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FS\AppBundle\Entity\Category;

class LoadCategory implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();

        $now = new \DateTime();

        $category
            ->setName('History')
            ->setCreated($now)
            ->setUpdated($now);

        $manager->persist($category);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
