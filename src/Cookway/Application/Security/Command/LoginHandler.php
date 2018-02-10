<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Security\Command;

use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class LoginHandler
{

    /**
     * @var UserProviderInterface
     */
    private $userProvider;
    /**
     * @var UserPasswordEncoder
     */
    private $encoder;

    public function __construct(UserProviderInterface $userProvider, UserPasswordEncoder $encoder)
    {
        $this->userProvider = $userProvider;
        $this->encoder = $encoder;
    }

    /**
     * @param Login $command
     */
    public function handle(Login $command)
    {

        $user = $this->userProvider->loadUserByUsername($command->username);

        if (!$user) {
            throw new UnauthorizedHttpException('Invalid user data provided');
        }

        $isValid = $this->encoder->isPasswordValid($user, $command->password);
        if (!$isValid) {
            throw new UnauthorizedHttpException('Invalid user data provided');
        }
    }
}