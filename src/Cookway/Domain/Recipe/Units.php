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
     * Returns lost of available units
     *
     * @return Unit[]
     */
    public function getAll();
}