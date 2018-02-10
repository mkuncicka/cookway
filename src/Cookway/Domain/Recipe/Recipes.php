<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Recipe;


interface Recipes
{
    /**
     * Adds Recipe to the repository
     *
     * @param Recipe $recipe
     */
    public function add(Recipe $recipe);

    /**
     * Returns all Recipes
     *
     * @return Recipe[]
     */
    public function getAll();

    /**
     * Returns recipe identified by given id
     * @param int $id
     * @return Recipe|null
     */
    public function getById(int $id);

}