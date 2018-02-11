<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Command;

use Cookway\Domain\Recipe\Ingredient;
use Cookway\Domain\Recipe\Ingredients;
use Cookway\Domain\Recipe\Recipe;
use Cookway\Domain\Recipe\Recipes;
use Cookway\Domain\Recipe\Units;

/**
 * Adds new recipe
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class CreateRecipeHandler
{
    /**
     * @var Recipes
     */
    private $recipes;
    /**
     * @var Units
     */
    private $units;
    /**
     * @var Ingredients
     */
    private $ingredients;

    public function __construct(Recipes $recipes, Units $units, Ingredients $ingredients)
    {
        $this->recipes = $recipes;
        $this->units = $units;
        $this->ingredients = $ingredients;
    }

    /**
     * Method handles command
     * @param CreateRecipe $command
     */
    public function handle(CreateRecipe $command)
    {
        $recipe = new Recipe($command->title, $command->prescription, $command->user);
        if ($command->description !== null) {
            $recipe->setDescription($command->description);
        }
        if ($command->preparationTime !== null) {
            $recipe->setPreparationTime($command->preparationTime);
        }
        if ($command->preparationTimeText !== null) {
            $recipe->setPreparationTimeText($command->preparationTimeText);
        }

        /** @var CreateIngredient $ingredient */
        foreach ($command->ingredients as $ingredient) {
            $unit = $this->units->getById($ingredient->unitId);
            $ingredient = new Ingredient($ingredient->name, $ingredient->amount, $unit);
            $ingredient->assignRecipe($recipe);
            $this->ingredients->add($ingredient);
        }

        $this->recipes->add($recipe);
    }
}