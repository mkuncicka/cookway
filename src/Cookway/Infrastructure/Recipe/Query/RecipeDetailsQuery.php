<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe\Query;

use Cookway\Application\Recipe\Query\RecipeDetailsQuery\RecipeDetailsQueryParameters;
use Cookway\Application\Recipe\Query\RecipeDetailsQuery\RecipeDetailsView;
use Cookway\Domain\Recipe\Recipes;
use Cookway\Infrastructure\QueryInterface;
use Cookway\Infrastructure\QueryParametersInterface;

/**
 * Query class - handles recipe details
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeDetailsQuery implements QueryInterface
{

    /**
     * @var Recipes
     */
    private $recipes;

    /**
     * @param Recipes $recipes
     */
    public function __construct(Recipes $recipes)
    {
        $this->recipes = $recipes;
    }

    /**
     * Returns details of the recipe
     *
     * @param RecipeDetailsQueryParameters $parameters
     * @return RecipeDetailsView
     */
    public function query(RecipeDetailsQueryParameters $parameters)
    {
        $recipe = $this->recipes->getById($parameters->id);

        if ($recipe === null) {
            throw new \InvalidArgumentException('Recipe with id: '. $parameters->id .' not found');
        }

        return RecipeDetailsView::createFromRecipe($recipe);
    }
}