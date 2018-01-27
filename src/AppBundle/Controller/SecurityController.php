<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace AppBundle\Controller;


use Cookway\Application\Security\Command\Login;
use Cookway\Infrastructure\Core\DoctrineUserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Method("POST")
     * @Route("/security/login")
     * @param Request $request
     */
    public function loginAction(Request $request)
    {
        $command = new Login($request->get('username'), $request->get('password'));
        $handler = $this->get('app.core.security.login_handler');
        $handler = $this->get('token');

        try {
            $handler->handle($command);
            /** @var DoctrineUserRepository $user */
            $user = $this->get('app.core.security.user_provider')->loadUserByUsername($command->username);

            $token = $tokenEncoder->encode(
                [
                    'username' => $user->getUsername(),
                ]
            );

            $response->headers->clearCookie('BEARER');
            $response->headers->setCookie(
                new Cookie('BEARER', $token)
            );

            return $response;

        } catch (\Exception $e) {
            throw new \InvalidArgumentException('Wrong user data');
        }

    }

}