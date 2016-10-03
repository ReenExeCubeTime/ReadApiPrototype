<?php

namespace FS\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FS\AppBundle\Entity\UserStoryFavorite;

class LoadUserStoryFavorite extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $now = new \DateTime();

        $relations = [
            'story-morning' => ['user-alex', 'user-vertys', 'user-reen'],
            'story-memory' => ['user-vertys'],
            'story-try' => [],
        ];

        foreach ($relations as $storyReference => $userReferences) {
            $story = $this->getReference($storyReference);

            foreach ($userReferences as $userReference) {
                $user = $this->getReference($userReference);

                $userStoryFavorite = new UserStoryFavorite();

                $userStoryFavorite
                    ->setStory($story)
                    ->setUser($user)
                    ->setCreated($now);

                $manager->persist($userStoryFavorite);
            }
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
