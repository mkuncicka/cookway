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
 * Recipe model
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class Recipe
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $prescription;
    /**
     * @var Ingredient[]
     */
    private $ingredients;
    /**
     * @var int
     */
    private $preparationTime;
    /**
     * @var string
     */
    private $preparationTimeText;
    /**
     * @var Photo[]
     */
    private $photos;
    /**
     * @var \DateTime
     */
    private $createdAt;
    /**
     * @var \DateTime
     */
    private $modifiedAt;
    /**
     * @var User
     */
    private $author;

    public function __construct(string $title, string $prescription, User $author)
    {
        $this->title = $title;
        $this->prescription = $prescription;
        $this->createdAt = new \DateTime();
        $this->author = $author;
    }

    /**
     * Adds ingredient to the recipe
     * @param Ingredient $ingredient
     * @return $this
     */
    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredients[] = $ingredient;

        return $this;
    }

    public function addPhoto(Photo $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }
}