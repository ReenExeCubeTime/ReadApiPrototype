<?php

namespace FS\AppBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AuthListener
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * AuthListener constructor.
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage, Registry $doctrine)
    {
        $this->tokenStorage = $tokenStorage;
        $this->doctrine = $doctrine;
    }

    public function onKernelRequest(KernelEvent $event)
    {
        if ($userId = $event->getRequest()->query->get('token')) {
            $user = $this
                ->doctrine
                ->getRepository('FSAppBundle:User')
                ->find($userId);

            if ($user) {
                $this
                    ->tokenStorage
                    ->setToken(new AnonymousToken('secret', $user));
            }
        }
    }
}