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

    /**
     * @param Photo $photo
     * @return Recipe
     */
    public function addPhoto(Photo $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * @return Recipe
     */
    public function setModifiedAt()
    {
        $this->modifiedAt = new \DateTime();

        return $this;
    }

    /**
     * @param string $title
     * @return Recipe
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $description
     * @return Recipe
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $prescription
     * @return Recipe
     */
    public function setPrescription(string $prescription)
    {
        $this->prescription = $prescription;

        return $this;
    }

    /**
     * @param int $preparationTime
     * @return Recipe
     */
    public function setPreparationTime(int $preparationTime)
    {
        $this->preparationTime = $preparationTime;

        return $this;
    }

    /**
     * @param string $preparationTimeText
     * @return Recipe
     */
    public function setPreparationTimeText(string $preparationTimeText)
    {
        $this->preparationTimeText = $preparationTimeText;

        return $this;
    }
}