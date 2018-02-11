<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Query\RecipeDetailsQuery;

use Cookway\Application\Recipe\Query\RecipeListQuery\IngredientListItemView;
use Cookway\Application\Recipe\Query\RecipeListQuery\IngredientListView;
use Cookway\Domain\Recipe\Ingredient;
use Cookway\Domain\Recipe\Recipe;

/**
 * Recipe details - view model
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeDetailsView
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
     * @var IngredientListView
     */
    public $ingredients;

    /**
     * @var int
     */
    public $preparationTime;

    /**
     * @var string
     */
    public $preparationTimeText;

    /**
     * @param int $id
     * @param string $title
     * @param string $prescription
     * @param string|null $description
     * @param int|null $preparationTime
     * @param string|null $preparationTimeText
     * @param IngredientListView|null $ingredients
     */
    public function __construct(int $id, string $title, string $prescription, string $description = null, int $preparationTime = null, string $preparationTimeText = null, IngredientListView $ingredients = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->prescription = $prescription;
        $this->description = $description;
        $this->preparationTime = $preparationTime;
        $this->preparationTimeText = $preparationTimeText;
        $this->ingredients = $ingredients;
    }

    /**
     * Creates instance of self from Recipe object
     *
     * @param Recipe $recipe
     * @return RecipeDetailsView
     */
    public static function createFromRecipe(Recipe $recipe)
    {
        $ingredients = [];

        /** @var Ingredient $ingredient */
        foreach ($recipe->getIngredients() as $ingredient) {
            $ingredients[] = new IngredientListItemView(
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
            new IngredientListView(count($ingredients), $ingredients)
        );
    }
}
