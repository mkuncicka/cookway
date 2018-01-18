<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe;

use Cookway\Domain\Recipe\Recipe;

/**
 * Class implementing adding new recipe
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class NewRecipeHandler
{
    public function handle(NewRecipe $command)
    {
        $recipe = new Recipe($command->title, $command->prescription, $command->user);
    }
}