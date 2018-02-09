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
use JMS\Serializer\Serializer;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Base controller class handling exceptions and wrapping responses
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class BaseController
{
    /**
     * @var CommandBus
     */
    private $commandBus;
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(CommandBus $commandBus, Serializer $serializer)
    {
        $this->commandBus = $commandBus;
        $this->serializer = $serializer;
    }

    public function handleCommand($command)
    {
        try {
            $response = $this->commandBus->handle($command);
            $response = new JsonResponse('', Response::HTTP_NO_CONTENT);
        } catch (\InvalidArgumentException $e) {
            $response = new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        } catch (AccessDeniedException $e) {
            $response = new JsonResponse($e->getMessage(), Response::HTTP_FORBIDDEN);
        } catch (\Exception $e) {
            $response = new JsonResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response;
    }

    public function query(QueryInterface $query, QueryParametersInterface $parameters) {

        try {
            $result = $query->query($parameters);
            $serializedResult = $this->serializer->serialize($result, 'json');

            $response = new JsonResponse($serializedResult, Response::HTTP_NO_CONTENT);
        } catch (\InvalidArgumentException $e) {
            $response = new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        } catch (AccessDeniedException $e) {
            $response = new JsonResponse($e->getMessage(), Response::HTTP_FORBIDDEN);
        } catch (\Exception $e) {
            $response = new JsonResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response;
    }

}