<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Recipe;

/**
 * Unit of the ingredient amount
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class Unit
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}