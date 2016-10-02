<?php

namespace FS\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FS\AppBundle\Entity\Story;

class LoadStory extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $story = new Story();

        $now = new \DateTime();

        $category = $this->getReference('category-history');

        $story
            ->setText('First Story')
            ->setCategory($category)
            ->setLangId(1)
            ->setStatus(1)
            ->setCreated($now)
            ->setUpdated($now);

        $manager->persist($story);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
