<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe;

use JMS\Serializer\Annotation as Serializer;

class CreateIngredient
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    public $name;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    public $amount;

    /**
     * @Serializer\Type("integer")
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