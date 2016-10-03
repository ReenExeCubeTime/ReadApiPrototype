<?php

namespace FS\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FS\AppBundle\Entity\User;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $now = new \DateTime();

        $userNameList = [
            'user-alex' => 'Alex',
            'user-vertys' => 'Vertys',
            'user-reen' => 'Reen',
        ];

        foreach ($userNameList as $reference => $userName) {
            $user = new User();

            $user
                ->setName($userName)
                ->setCreated($now)
                ->setUpdated($now);

            $this->addReference($reference, $user);

            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
