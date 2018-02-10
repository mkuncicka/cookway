<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe;

use Cookway\Domain\Core\User;
use JMS\Serializer\Annotation as Serializer;

/**
 * Intention of adding new recipe
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class CreateRecipe
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    public $title;

    /**
     * @Serializer\Type("Cookway\Application\Recipe\CreateIngredient")
     * @var CreateIngredient
     */
    public $ingredients;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    public $description;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    public $prescription;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    public $preparationTime;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    public $preparationTimeText;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    public $photoId;

    /**
     * @var User
     */
    public $user;

    public function __construct(string $title, string $prescription, array $ingredients = [], string $description = null,
                                int $preparationTime = null, string $preparationTimeText = null, int $photoId = null
    )
    {
        $this->title = $title;
        $this->ingredients = $ingredients;
        $this->description = $description;
        $this->prescription = $prescription;
        $this->preparationTime = $preparationTime;
        $this->preparationTimeText = $preparationTimeText;
        $this->photoId = $photoId;
    }
}