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
        $date = new \DateTime('-1 day');

        $category = $this->getReference('category-history');
        $language = $this->getReference('language-ukrainian');

        $stories = [
            'story-morning' => 'Good morning Story',
            'story-memory' => 'Memory Story',
            'story-try' => 'Try Story',
            'story-funny' => 'Funny',
            'story-little' => 'Little',
        ];

        foreach ($stories as $reference => $text) {
            $story = new Story();

            $story
                ->setText($text)
                ->setCategory($category)
                ->setLanguage($language)
                ->setStatus(1)
                ->setBegin($date)
                ->setCreated($date)
                ->setUpdated($date);

            $this->addReference($reference, $story);

            $manager->persist($story);
        }

        $story = new Story();

        $story
            ->setText('Future Story')
            ->setCategory($category)
            ->setLanguage($language)
            ->setStatus(1)
            ->setBegin(new \DateTime('+1 hour'))
            ->setCreated($date)
            ->setUpdated($date);

        $manager->persist($story);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
