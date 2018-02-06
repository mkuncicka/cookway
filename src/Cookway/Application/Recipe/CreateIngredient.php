<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe;

class CreateIngredient
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var float
     */
    public $amount;

    /**
     * @var int
     */
    public $unitId;

    public function __construct(string $name, float $amount, int $unitId)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->unitId = $unitId;
    }
}