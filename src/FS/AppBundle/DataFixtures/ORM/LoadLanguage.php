<?php

namespace FS\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FS\AppBundle\Entity\Language;

class LoadLanguage extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = new Language();

        $now = new \DateTime();

        $category
            ->setName('Ukrainian')
            ->setCreated($now)
            ->setUpdated($now);

        $manager->persist($category);
        $manager->flush();

        $this->addReference('language-ukrainian', $category);
    }

    public function getOrder()
    {
        return 1;
    }
}
