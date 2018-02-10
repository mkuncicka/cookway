<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
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
        $em = $this->get('doctrine.orm.entity_manager');
        $commandBus = $this->get('tactician.commandbus');
        $serializer = $this->get('jms_serializer');
        $em->beginTransaction();

        try {
            $result = $commandBus->handle($command);
            $serializedResult = $serializer->serialize($result, 'json');

            $response = new Response($serializedResult, Response::HTTP_NO_CONTENT);
            $response->headers->set('Content-Type', 'application/json');

            $em->flush();
            $em->commit();
        } catch (\InvalidArgumentException $e) {
            $response = new Response($e->getMessage(), Response::HTTP_BAD_REQUEST);
            $em->rollback();
        } catch (AccessDeniedException $e) {
            $response = new Response($e->getMessage(), Response::HTTP_FORBIDDEN);
            $em->rollback();
        } catch (\Exception $e) {
            $response = new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
            $em->rollback();
        }

        if ($em->isOpen()) {
            $em->close();
        }

        return $response;
    }

    public function query(QueryInterface $query, QueryParametersInterface $parameters)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $serializer = $this->get('jms_serializer');
        $em->beginTransaction();

        try {
            $result = $query->query($parameters);
            $serializedResult = $serializer->serialize($result, 'json');

            $response = new Response($serializedResult, Response::HTTP_OK);
            $response->headers->set('Content-Type', 'application/json');


            $em->flush();
            $em->commit();

        } catch (\InvalidArgumentException $e) {
            $response = new Response($e->getMessage(), Response::HTTP_BAD_REQUEST);
            $em->rollback();
        } catch (AccessDeniedException $e) {
            $response = new Response($e->getMessage(), Response::HTTP_FORBIDDEN);
            $em->rollback();
        } catch (\Exception $e) {
            $response = new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
            $em->rollback();
        }

        if ($em->isOpen()) {
            $em->close();
        }

        return $response;
    }

}