<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Core;

use Cookway\Domain\Recipe\Recipe;

/**
 * TODO opis klasy User
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class User
{
    /**
     * Id number of the user
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var Recipe[]
     */
    private $recipes;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function addRecipe(Recipe $recipe)
    {
        $this->recipes[] = $recipe;
    }
}