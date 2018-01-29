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
     * @Method("POST")
     * @Route("/recipes/new")
     *
     * @param Request $request
     * @return Response
     */
    public function newRecipe(Request $request)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');
        $em->beginTransaction();
        $content = $request->getContent();
        $serializer = $this->get('jms_serializer');
        $command = $serializer->deserialize($content, NewRecipe::class, 'json');
        $command->user = $this->getUser();
        $handler = $this->get('app.recipe.new_recipe_handler');
        try {
            $handler->handle($command);
            $response = new Response("", 204);
        } catch (\Exception $e) {
            $response = new Response($e->getMessage(), 500);
        }

        $em->flush();
        $em->commit();
        return $response;
    }
}