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
use Cookway\Application\Recipe\Query\RecipeListQuery\IngredientListItemView;
use Cookway\Application\Recipe\Query\RecipeListQuery\IngredientListView;
use Cookway\Domain\Recipe\Recipes;
use Cookway\Tests\AbstractIntegrationTestCase;

/**
 * RecipeDetailsQuery integration tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeDetailsQueryTest extends AbstractIntegrationTestCase
{
    /**
     * @var RecipeDetailsQuery
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
        $this->testObject = new RecipeDetailsQuery($this->recipes);
    }

    /**
     * @test
     */
    public function shouldReturnList()
    {
        $parameters = new RecipeDetailsQueryParameters();
        $parameters->id = 1;
        $result = $this->testObject->query($parameters);

        $this->assertInstanceOf(RecipeDetailsView::class, $result);
        $this->assertInstanceOf(IngredientListView::class, $result->ingredients);
        $this->assertEquals($result->ingredients->totalCount, count($result->ingredients->data));
        foreach ($result->ingredients->data as $ingredient) {
            $this->assertInstanceOf(IngredientListItemView::class, $ingredient);
        }
    }
}