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
        $now = new \DateTime();

        $category = $this->getReference('category-history');
        $language = $this->getReference('language-ukrainian');

        $stories = [
            'story-morning' => 'Good morning Story',
            'story-memory' => 'Memory Story',
            'story-try' => 'Try Story',
        ];

        foreach ($stories as $reference => $text) {
            $story = new Story();

            $story
                ->setText($text)
                ->setCategory($category)
                ->setLanguage($language)
                ->setStatus(1)
                ->setCreated($now)
                ->setUpdated($now);

            $this->addReference($reference, $story);

            $manager->persist($story);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
