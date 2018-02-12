<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe\Query;

use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListItemView;
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListView;
use Cookway\Application\Recipe\Query\UsersRecipeListQuery\UsersRecipeListQueryParameters;
use Cookway\Domain\Core\User;
use Cookway\Domain\Core\Users;
use Cookway\Domain\Recipe\Ingredient;
use Cookway\Domain\Recipe\Recipe;
use Cookway\Domain\Recipe\Recipes;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

/**
 * UsersRecipeListQuery unit tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class UsersRecipeListQueryTest extends TestCase
{
    /**
     * @var RecipeListQuery
     */
    private $testObject;

    /**
     * @var MockObject
     */
    private $recipes;

    public function setUp()
    {
        $this->recipes = $this->createMock(Recipes::class);
        $this->users = $this->createMock(Users::class);
        $this->testObject = new UsersRecipeListQuery($this->recipes, $this->users);
    }

    /**
     * @test
     */
    public function shouldPass()
    {
        $parameters = $this->createMock(UsersRecipeListQueryParameters::class);
        $parameters->userId = 1;
        $recipe = $this->createMock(Recipe::class);
        $user = $this->createMock(User::class);
        $ingredients = new ArrayCollection();
        $ingredient = $this->createMock(Ingredient::class);
        $ingredients->add($ingredient);
        $recipe->expects($this->once())->method('getIngredients')->willReturn($ingredients);

        $this->users->expects($this->once())->method('getById')->willReturn($user);
        $this->recipes->expects($this->once())->method('getByUser')->willReturn([$recipe]);

        $result = $this->testObject->query($parameters);

        $this->assertInstanceOf(RecipeListView::class, $result);
        $this->assertInstanceOf(RecipeListItemView::class, $result->data[0]);
    }

}