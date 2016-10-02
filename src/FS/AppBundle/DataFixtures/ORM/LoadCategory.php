<?php

namespace FS\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FS\AppBundle\Entity\Category;

class LoadCategory extends AbstractFixture implements OrderedFixtureInterface
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

        $this->addReference('category-history', $category);
    }

    public function getOrder()
    {
        return 1;
    }
}
