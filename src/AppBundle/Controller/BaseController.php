<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace AppBundle\Controller;

use Cookway\Infrastructure\QueryInterface;
use Cookway\Infrastructure\QueryParametersInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Base controller class handling exceptions and wrapping responses
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class BaseController extends Controller
{
    public function handleCommand($command)
    {
        $commandBus = $this->get('tactician.commandbus');
        $serializer = $this->get('jms_serializer');

        try {
            $result = $commandBus->handle($command);
            $serializedResult = $serializer->serialize($result, 'json');

            $response = new Response($serializedResult, Response::HTTP_NO_CONTENT);
            $response->headers->set('Content-Type', 'application/json');

        } catch (\InvalidArgumentException $e) {
            $response = new Response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        } catch (AccessDeniedException $e) {
            $response = new Response($e->getMessage(), Response::HTTP_FORBIDDEN);
        } catch (\Exception $e) {
            $response = new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response;
    }

    public function query(QueryInterface $query, QueryParametersInterface $parameters)
    {
        $serializer = $this->get('jms_serializer');

        try {
            $result = $query->query($parameters);
            $serializedResult = $serializer->serialize($result, 'json');

            $response = new Response($serializedResult, Response::HTTP_OK);
            $response->headers->set('Content-Type', 'application/json');

        } catch (\InvalidArgumentException $e) {
            $response = new Response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        } catch (AccessDeniedException $e) {
            $response = new Response($e->getMessage(), Response::HTTP_FORBIDDEN);
        } catch (\Exception $e) {
            $response = new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response;
    }

}