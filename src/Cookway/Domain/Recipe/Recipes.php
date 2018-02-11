<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Recipe;

use Cookway\Domain\Core\User;

/**
 * Recipe repository interface
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
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

    /**
     * Returns all recepies of one user
     * @param User $user
     * @return Recipe[]
     */
    public function getByUser(User $user);

}