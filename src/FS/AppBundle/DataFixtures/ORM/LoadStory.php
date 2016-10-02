<?php

namespace FS\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FS\AppBundle\Entity\Story;

class LoadStory implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $story = new Story();

        $now = new \DateTime();

        $category = $manager->getRepository('FSAppBundle:Category')->find(1);

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
