<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Security;

use Cookway\Domain\Core\User;
use Cookway\Infrastructure\Core\DoctrineUserRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Implementation of Symfony user provider
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class UserProvider implements UserProviderInterface
{

    /**
     * @var DoctrineUserRepository
     */
    private $users;

    public function __construct(DoctrineUserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @inheritdoc
     */
    public function loadUserByUsername($username)
    {
        return $this->users->getByUsername($username);
    }

    /**
     * @inheritdoc
     */
    public function refreshUser(UserInterface $user)
    {
        if ($user instanceof User) {
            return $this->loadUserByUsername($user->getUsername());
        } else {
            throw new UnsupportedUserException();
        }
    }

    /**
     * @inheritdoc
     */
    public function supportsClass($class)
    {
        return $class instanceof User;
    }
}