<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace AppBundle\Controller;

use Cookway\Application\Recipe\CreateRecipe;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller responsible for actions connected with recipes management
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeController extends BaseController
{
    /**
     * @Method("POST")
     * @Route("/recipes")
     *
     * @param Request $request
     * @return Response
     */
    public function createRecipe(Request $request)
    {
        $serializer = $this->get('jms_serializer');

        $command = $serializer->deserialize($request->getContent(), CreateRecipe::class, 'json');
        $command->user = $this->getUser();

        return $this->handleCommand($command);
    }
}