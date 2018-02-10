<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Query\RecipeListQuery;


class IngredientItemView
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $name;
    /**
     * @var float
     */
    public $amount;
    /**
     * @var string
     */
    public $unitName;

    /**
     * IngredientItemView constructor.
     * @param int $id
     * @param string $name
     * @param float $amount
     * @param string $unitName
     */
    public function __construct(int $id, string $name, float $amount, string $unitName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->amount = $amount;
        $this->unitName = $unitName;
    }
}