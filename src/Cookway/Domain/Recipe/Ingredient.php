<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Recipe;

/**
 * Ingredient model
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class Ingredient
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $amount;
    /**
     * @var Unit
     */
    private $unit;
    /**
     * @var Recipe
     */
    private $recipe;

    /**
     * @param string $name
     * @param float $amount
     * @param Unit $unit
     */
    public function __construct(string $name, float $amount, Unit $unit)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->unit = $unit;
    }

    /**
     * Assigns Recipe to ingredient
     * @param Recipe $recipe
     * @return $this
     */
    public function assignRecipe(Recipe $recipe)
    {
        $this->recipe = $recipe;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return Unit
     */
    public function getUnit(): Unit
    {
        return $this->unit;
    }
}