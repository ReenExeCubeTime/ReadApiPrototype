<?php

namespace FS\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use FS\AppBundle\Entity\User;

class LoadUser extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $now = new \DateTime();

        $userNameList = [
            'Alex',
            'Vertys',
            'Reen',
        ];

        foreach ($userNameList as $userName) {
            $user = new User();

            $user
                ->setName($userName)
                ->setCreated($now)
                ->setUpdated($now);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
