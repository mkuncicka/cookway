<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Command;

use Cookway\Domain\Recipe\Ingredient;
use Cookway\Domain\Recipe\Recipe;
use Cookway\Tests\AbstractIntegrationTestCase;

/**
 * CreateRecipeHandler integration tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class CreateRecipeHandlerIntegrationTest extends AbstractIntegrationTestCase
{
    private $testObject;
    private $recipes;
    private $units;
    private $ingredients;

    public function __construct()
    {
        parent::__construct();
        $this->recipes = self::$container->get('app.recipe.recipes_repository');
        $this->units = self::$container->get('app.recipe.unit_repository');
        $this->ingredients = self::$container->get('app.recipe.ingredients_repository');
        $this->testObject = new CreateRecipeHandler($this->recipes, $this->units, $this->ingredients);
    }

    /**
     * @test
     */
    public function shouldCreateRecipe()
    {

        $command = $this->prepareCommand();
        $commandBus = self::$container->get('tactician.commandbus');
        $result = $commandBus->handle($command);

        $this->assertNull($result);
        $recipes = $this->recipes->getAll();
        $assertedRecipe = null;

        /** @var Recipe $recipe */
        foreach ($recipes as $recipe) {
            if ($recipe->getTitle() === 'Extra recipe') {
                $assertedRecipe = $recipe;
                break;
            }
        }

        $this->assertInstanceOf(Recipe::class , $assertedRecipe);
        $this->assertEquals('long description', $assertedRecipe->getDescription());
        $this->assertCount(2 , $assertedRecipe->getIngredients());
    }

    public function prepareCommand()
    {
        $user = self::$container->get('app.core.users_repository')->getByUsername('user');

        $ingredients = [];
        $ingredients[] = new CreateIngredient('one', 10, 1);
        $ingredients[] = new CreateIngredient('two', 20, 2);
        $command = new CreateRecipe(
            'Extra recipe',
            'mix all ingredients',
            $ingredients,
            'long description',
            60,
            'new extra text',
            null
        );
        $command->user = $user;

        return $command;
    }

}