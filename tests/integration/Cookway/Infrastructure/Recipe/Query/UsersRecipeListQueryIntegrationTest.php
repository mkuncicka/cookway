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
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListView;
use Cookway\Application\Recipe\Query\UsersRecipeListQuery\UsersRecipeListQueryParameters;
use Cookway\Domain\Core\Users;
use Cookway\Domain\Recipe\Recipes;
use Cookway\Tests\AbstractIntegrationTestCase;

/**
 * UsersRecipeListQuery integration tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class UsersRecipeListQueryIntegrationTest extends AbstractIntegrationTestCase
{
    /**
     * @var UsersRecipeListQuery
     */
    private $testObject;

    /**
     * @var Recipes
     */
    private $recipes;

    /**
     * @var Users
     */
    private $users;

    public function setUp($path = null)
    {
        parent::setUp($path);
        $this->recipes = self::$container->get('app.recipe.recipes_repository');
        $this->users = self::$container->get('app.core.users_repository');
        $this->testObject = new UsersRecipeListQuery($this->recipes, $this->users);
    }

    /**
     * @test
     */
    public function shouldReturnList()
    {
        $parameters = new UsersRecipeListQueryParameters();
        $parameters->userId = 1;
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