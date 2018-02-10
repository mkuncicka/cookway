<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Recipe;


interface Ingredients
{
    /**
     * Adds ingredient to repository
     * @param Ingredient $ingredient
     * @return void
     */
    public function add(Ingredient $ingredient);

    /**
     * Returns ingredient by given id
     * @param $id
     * @return Ingredient
     */
    public function getById($id);
}