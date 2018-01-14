<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe;


use Cookway\Domain\Recipe\Recipe;

class NewRecipeHandler
{
    public function handle(NewRecipeCommand $command)
    {
        $recipe = new Recipe($command->title, $command->prescription, $command->user);

    }
}