<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe;

use Cookway\Domain\Recipe\Recipe;
use Cookway\Infrastructure\Recipe\DoctrineRecipesRepository;

/**
 * Class implementing adding new recipe
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class NewRecipeHandler
{
    /**
     * @var DoctrineRecipesRepository
     */
    private $recipesRepository;

    public function __construct(DoctrineRecipesRepository $recipesRepository)
    {
        $this->recipesRepository = $recipesRepository;
    }

    public function handle(NewRecipe $command)
    {
        $recipe = new Recipe($command->title, $command->prescription, $command->user);
        $this->recipesRepository->add($recipe);
    }
}