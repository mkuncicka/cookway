<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace tests\unit\Cookway\Infrastructure\Recipe\Query;

use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListItemView;
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListQueryParameters;
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListView;
use Cookway\Domain\Recipe\Ingredient;
use Cookway\Domain\Recipe\Recipe;
use Cookway\Domain\Recipe\Recipes;
use Cookway\Infrastructure\Recipe\Query\RecipeListQuery;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * RecipeListQuery unit tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeListQueryTest extends TestCase
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
        $this->testObject = new RecipeListQuery($this->recipes);
    }

    /**
     * @test
     */
    public function shouldPass()
    {
        $parameters = $this->createMock(RecipeListQueryParameters::class);

        $recipe = $this->createMock(Recipe::class);
        $ingredients = new ArrayCollection();
        $ingredient = $this->createMock(Ingredient::class);
        $ingredients->add($ingredient);
        $recipe->expects($this->once())->method('getIngredients')->willReturn($ingredients);

        $this->recipes->expects($this->once())->method('getAll')->willReturn([$recipe]);

        $result = $this->testObject->query($parameters);

        $this->assertInstanceOf(RecipeListView::class, $result);
        $this->assertInstanceOf(RecipeListItemView::class, $result->data[0]);
    }

}