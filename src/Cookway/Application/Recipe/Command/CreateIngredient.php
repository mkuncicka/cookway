<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Command;

use JMS\Serializer\Annotation as Serializer;

/**
 * Intention of creating new ingredient
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
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

    /**
     * @param string $name
     * @param float $amount
     * @param int $unitId
     */
    public function __construct(string $name, float $amount, int $unitId)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->unitId = $unitId;
    }
}