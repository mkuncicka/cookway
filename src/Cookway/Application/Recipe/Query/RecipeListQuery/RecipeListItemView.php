<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Query\RecipeListQuery;

use Cookway\Domain\Recipe\Ingredient;
use Cookway\Domain\Recipe\Recipe;

/**
 * Single recipe on the list - view model
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeListItemView
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $title;
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
     * @var IngredientItemView[]
     */
    public $ingredients;
    /**
     * @var int
     */
    public $photoId;

    /**
     * RecipeListItemView constructor.
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $prescription
     * @param int $preparationTime
     * @param string $preparationTimeText
     * @param IngredientItemView[] $ingredients
     * @param int|null $photoId
     */
    public function __construct(int $id, string $title, string $prescription, string $description = null, int $preparationTime = null,
                                string $preparationTimeText = null, array $ingredients = [], int $photoId = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->prescription = $prescription;
        $this->preparationTime = $preparationTime;
        $this->preparationTimeText = $preparationTimeText;
        $this->ingredients = $ingredients;
        $this->photoId = $photoId;
        $this->id = $id;
    }


    public static function createFromRecipe(Recipe $recipe)
    {
        $ingredients = [];
        /** @var Ingredient $ingredient */
        foreach ($recipe->getIngredients() as $ingredient) {
            $ingredients[] = new IngredientItemView(
                $ingredient->getId(),
                $ingredient->getName(),
                $ingredient->getAmount(),
                $ingredient->getUnit()->getName()
            );
        }
        return new self(
            $recipe->getId(),
            $recipe->getTitle(),
            $recipe->getPrescription(),
            $recipe->getDescription(),
            $recipe->getPreparationTime(),
            $recipe->getPreparationTimeText(),
            $ingredients
        );
    }
}