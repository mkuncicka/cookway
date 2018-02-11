<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Recipe;

/**
 * Unit repository interface
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
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