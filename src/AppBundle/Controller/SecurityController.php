<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace AppBundle\Controller;


use Cookway\Application\Security\Command\Login;
use Cookway\Domain\Core\User;
use Cookway\Infrastructure\Core\DoctrineUserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
{
    /**
     * @Method("POST")
     * @Route("/security/login")
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request)
    {
        $serializer = $this->get('jms_serializer');
        $command = $serializer->deserialize($request->getContent(), Login::class, 'json');
        $handler = $this->get('app.core.security.login_handler');
        $tokenEncoder = $this->get('lexik_jwt_authentication.encoder');

        try {
            $handler->handle($command);
            /** @var User $user */
            $user = $this->get('app.core.security.user_provider')->loadUserByUsername($command->username);

            $token = $tokenEncoder->encode(
                [
                    'username' => $user->getUsername(),
                ]
            );

            $response = new Response();

            $response->headers->clearCookie('BEARER');
            $response->headers->setCookie(
                new Cookie('BEARER', $token)
            );

            return $response;

        } catch (\Exception $e) {
            $response = new Response($e->getMessage(), $e->getCode());
            return $response;
        }
    }

}