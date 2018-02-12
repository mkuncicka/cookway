<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace tests\unit\Cookway\Infrastructure\Recipe\Query;

use Cookway\Application\Recipe\Query\RecipeDetailsQuery\RecipeDetailsQueryParameters;
use Cookway\Application\Recipe\Query\RecipeDetailsQuery\RecipeDetailsView;
use Cookway\Domain\Recipe\Ingredient;
use Cookway\Domain\Recipe\Recipe;
use Cookway\Domain\Recipe\Recipes;
use Cookway\Infrastructure\Recipe\Query\RecipeDetailsQuery;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * RecipeDetailsQuery unit tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeDetailsQueryTest extends TestCase
{
    /**
     * @var RecipeDetailsQuery
     */
    private $testObject;

    /**
     * @var MockObject
     */
    private $recipes;

    public function setUp()
    {
        $this->recipes = $this->createMock(Recipes::class);
        $this->testObject = new RecipeDetailsQuery($this->recipes);
    }

    /**
     * @test
     */
    public function shouldPass()
    {
        $parameters = $this->createMock(RecipeDetailsQueryParameters::class);
        $parameters->id = 1;
        $recipe = $this->createMock(Recipe::class);
        $ingredients = new ArrayCollection();
        $ingredient = $this->createMock(Ingredient::class);
        $ingredients->add($ingredient);
        $recipe->expects($this->once())->method('getIngredients')->willReturn($ingredients);

        $this->recipes->expects($this->once())->method('getById')->willReturn($recipe);
        $result = $this->testObject->query($parameters);

        $this->assertInstanceOf(RecipeDetailsView::class, $result);
    }

}