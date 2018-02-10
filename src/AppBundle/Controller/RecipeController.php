<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace AppBundle\Controller;

use Cookway\Application\Recipe\CreateRecipe;
use Cookway\Application\Recipe\Query\RecipeDetailsQuery\RecipeDetailsQueryParameters;
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListQueryParameters;
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

    /**
     * @Method("GET")
     * @Route("/recipes")
     *
     * @param Request $request
     * @return Response
     */
    public function getRecipeList(Request $request)
    {
        $query = $this->get('app.recipe.recipe_list_query');
        $parameters = RecipeListQueryParameters::fromRequest($request);

        return $this->query($query, $parameters);
    }

    /**
     * @Method("GET")
     * @Route("/recipes/{id}")
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function getRecipeDetails(Request $request, $id)
    {
        $query = $this->get('app.recipe.recipe_details_query');
        $parameters = RecipeDetailsQueryParameters::fromRequest($request);
        $parameters->id = $id;

        return $this->query($query, $parameters);
    }
}