<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Security\Command;

use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class LoginHandler
{

    /**
     * @var UserProviderInterface
     */
    private $userProvider;
    /**
     * @var PasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserProviderInterface $userProvider, PasswordEncoderInterface $encoder)
    {
        $this->userProvider = $userProvider;
        $this->encoder = $encoder;
    }

    public function handle(Login $command)
    {
        $user = $this->userProvider->loadUserByUsername($command->username);

        if (!$user) {
            throw new AccessDeniedException('Invalid user data provided');
        }

        $encodedPassword = $this->encoder->encodePassword($user, $command->password);
        if ($user->getPassword() != $encodedPassword) {
            throw new AccessDeniedException('Invalid user data provided');
        }
    }
}