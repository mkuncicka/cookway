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

    public function __construct(DoctrineRecipesRepository $recipesRepository, Units $units)
    {
        $this->recipesRepository = $recipesRepository;
        $this->units = $units;
    }

    public function handle(CreateRecipe $command)
    {
        $recipe = new Recipe($command->title, $command->prescription, $command->user);
        $recipe->setDescription($command->description);
        $recipe->setPreparationTime($command->preparationTime);
        $recipe->setPreparationTimeText($command->preparationTimeText);

        /** @var CreateIngredient $ingredient */
        foreach ($command->ingredients as $ingredient) {
            $unit = $this->units->getById($ingredient->unitId);
            $ingredient = new Ingredient($ingredient->name, $ingredient->amount, $unit);
            $recipe->addIngredient($ingredient);
        }

        $this->recipesRepository->add($recipe);
    }
}