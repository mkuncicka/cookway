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
use Cookway\Infrastructure\Dictionary\UnitDictionaryQuery;
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

    public function __construct(DoctrineRecipesRepository $recipesRepository, UnitDictionaryQuery $units)
    {
        $this->recipesRepository = $recipesRepository;
    }

    public function handle(CreateRecipe $command)
    {
        $recipe = new Recipe($command->title, $command->prescription, $command->user);
        /** @var CreateIngredient $ingredient */
        foreach ($command->ingredients as $ingredient) {
            $unit = $this->
            $recipe->addIngredient(
                new Ingredient($ingredient->name, $ingredient->amount, $ingredien)
            );
        }
        $this->recipesRepository->add($recipe);
    }
}