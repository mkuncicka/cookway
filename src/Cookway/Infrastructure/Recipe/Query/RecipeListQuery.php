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
use Cookway\Infrastructure\QueryInterface;
use Cookway\Infrastructure\QueryParametersInterface;
use Cookway\Infrastructure\Recipe\DoctrineRecipesRepository;
use Doctrine\ORM\EntityManagerInterface;

class RecipeListQuery implements QueryInterface
{
    /**
     * @var DoctrineRecipesRepository
     */
    private $recipes;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(DoctrineRecipesRepository $recipes, EntityManagerInterface $entityManager)
    {
        $this->recipes = $recipes;
        $this->entityManager = $entityManager;
    }

    /**
     * Returns queried data
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