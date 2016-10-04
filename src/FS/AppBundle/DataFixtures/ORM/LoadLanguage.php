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
        $language = new Language();

        $now = new \DateTime();

        /**
         * https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
         */
        $language
            ->setName('Ukrainian')
            ->setCode('uk')
            ->setCreated($now)
            ->setUpdated($now);

        $manager->persist($language);
        $manager->flush();

        $this->addReference('language-ukrainian', $language);
    }

    public function getOrder()
    {
        return 1;
    }
}
