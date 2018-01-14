<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Recipe;

/**
 * Recipe photo model
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class Photo
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
     * @var string
     */
    private $fileName;
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $extension;
    /**
     * @var Recipe
     */
    private $recipe;
    /**
     * @var bool
     */
    private $isMain;

    public function __construct(string $name, string $fileName, string $extension, Recipe $recipe, bool $isMain)
    {
        $this->name = $name;
        $this->fileName = $fileName;
        $this->extension = $extension;
        $this->recipe = $recipe;
        $this->isMain = $isMain;
    }
}