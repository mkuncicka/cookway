<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe\Query;

use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListItemView;
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListQueryParameters;
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListView;
use Cookway\Domain\Recipe\Recipe;
use Cookway\Domain\Recipe\Recipes;
use Cookway\Infrastructure\QueryInterface;
use Cookway\Infrastructure\QueryParametersInterface;
use Cookway\Infrastructure\Recipe\DoctrineRecipesRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Query class - handles recipe list
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeListQuery implements QueryInterface
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
     * Returns list of recipes
     *
     * @param RecipeListQueryParameters $parameters
     * @return mixed
     */
    public function query(RecipeListQueryParameters $parameters)
    {
        $recipes = $this->recipes->getAll();
        $data = [];

        foreach ($recipes as $recipe) {
            $data[] = RecipeListItemView::createFromRecipe($recipe);
        }

        return new RecipeListView(count($data), $data);
    }
}