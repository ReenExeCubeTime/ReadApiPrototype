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

        $story
            ->setText('First Story')
            ->setCategoryId(1)
            ->setLangId(1)
            ->setStatus(1)
            ->setCreated($now)
            ->setUpdated($now);

        $manager->persist($story);
        $manager->flush();
    }
}
