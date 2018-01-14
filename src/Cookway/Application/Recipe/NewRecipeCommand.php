<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe;


use Cookway\Domain\Core\User;

class NewRecipeCommand
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var array
     */
    public $ingredientsIds;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $prescription;

    /**
     * @var int
     */
    public $preparationTime;

    /**
     * @var string
     */
    public $preparationTimeText;

    /**
     * @var int
     */
    public $photoId;

    /**
     * @var User
     */
    public $user;

    public function __construct(string $title, string $prescription, array $ingredientsIds = [], string $description = null,
                                int $preparationTime = null, string $preparationTimeText = null, int $photoId = null
    )
    {
        $this->title = $title;
        $this->ingredientsIds = $ingredientsIds;
        $this->description = $description;
        $this->prescription = $prescription;
        $this->preparationTime = $preparationTime;
        $this->preparationTimeText = $preparationTimeText;
        $this->photoId = $photoId;
    }
}