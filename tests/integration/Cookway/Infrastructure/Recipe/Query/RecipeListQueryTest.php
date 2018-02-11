<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe\Query;

use Cookway\Application\Recipe\Query\RecipeListQuery\IngredientListItemView;
use Cookway\Application\Recipe\Query\RecipeListQuery\IngredientListView;
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListItemView;
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListQueryParameters;
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListView;
use Cookway\Domain\Recipe\Recipes;
use Cookway\Tests\AbstractIntegrationTestCase;

/**
 * RecipeListQuery integration tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeListQueryTest extends AbstractIntegrationTestCase
{
    /**
     * @var RecipeListQuery
     */
    private $testObject;

    /**
     * @var Recipes
     */
    private $recipes;

    public function setUp($path = null)
    {
        parent::setUp($path);
        $this->recipes = self::$container->get('app.recipe.recipes_repository');
        $this->testObject = new RecipeListQuery($this->recipes, self::$entityManager);
    }

    /**
     * @test
     */
    public function shouldReturnList()
    {
        $parameters = new RecipeListQueryParameters();
        $result = $this->testObject->query($parameters);

        $this->assertInstanceOf(RecipeListView::class, $result);
        $this->assertEquals($result->totalCount, count($result->data));
        foreach ($result->data as $recipeView) {
            $this->assertInstanceOf(RecipeListItemView::class, $recipeView);
            $this->assertInstanceOf(IngredientListView::class, $recipeView->ingredients);
            $this->assertEquals($recipeView->ingredients->totalCount, count($recipeView->ingredients->data));

            foreach ($recipeView->ingredients->data as $ingredient) {
                $this->assertInstanceOf(IngredientListItemView::class, $ingredient);
            }
        }
    }
}