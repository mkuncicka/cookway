<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Recipe;

/**
 * Interface for Unit repository
 *
 * @package Cookway\Domain\Recipe
 */
interface Units
{
    /**
     * Returns list of available units
     *
     * @return Unit[]
     */
    public function getAll();

    /**
     * Returns unit identified by id or null if doesn't exists
     *
     * @param int $id
     * @return Unit
     */
    public function getById(int $id);
}