<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe;

use Cookway\Domain\Recipe\Ingredient;
use Cookway\Domain\Recipe\Recipe;
use Cookway\Domain\Recipe\Units;
use Cookway\Infrastructure\Recipe\DoctrineIngredientsRepository;
use Cookway\Infrastructure\Recipe\DoctrineRecipesRepository;

/**
 * Class implementing adding new recipe
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class CreateRecipeHandler
{
    /**
     * @var DoctrineRecipesRepository
     */
    private $recipesRepository;
    /**
     * @var Units
     */
    private $units;
    /**
     * @var DoctrineIngredientsRepository
     */
    private $ingredients;

    public function __construct(DoctrineRecipesRepository $recipesRepository, Units $units, DoctrineIngredientsRepository $ingredients)
    {
        $this->recipesRepository = $recipesRepository;
        $this->units = $units;
        $this->ingredients = $ingredients;
    }

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

        $this->recipesRepository->add($recipe);
    }
}