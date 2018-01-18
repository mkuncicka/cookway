<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace AppBundle\Controller;

use Cookway\Application\Recipe\NewRecipe;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller responsible for actions connected with recipes management
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeController extends Controller
{
    /**
     *
     *
     * @Method("POST")
     * @Route("/recipes/new")
     *
     * @var Request
     *
     * @return Response
     */
    public function newRecipe(Request $request)
    {
        $content = $request->getContent();
        $serializer = $this->get('jms_serializer');
        $command = $serializer->deserialize($content, NewRecipe::class, 'json');
        $command->user = $this->getUser();

        $handler = $this->get('app.recipe.new_recipe_handler');
        $handler->handle($command);

    }
}