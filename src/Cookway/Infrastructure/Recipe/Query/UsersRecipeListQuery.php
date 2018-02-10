<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe\Query;

use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListItemView;
use Cookway\Application\Recipe\Query\RecipeListQuery\RecipeListView;
use Cookway\Application\Recipe\Query\UsersRecipeListQuery\UsersRecipeListQueryParameters;
use Cookway\Domain\Core\Users;
use Cookway\Domain\Recipe\Recipes;
use Cookway\Infrastructure\QueryInterface;

class UsersRecipeListQuery implements QueryInterface
{
    /**
     * @var Recipes
     */
    private $recipes;
    /**
     * @var Users
     */
    private $users;

    /**
     * UsersRecipeListQuery constructor.
     * @param Recipes $recipes
     * @param Users $users
     */
    public function __construct(Recipes $recipes, Users $users)
    {
        $this->recipes = $recipes;
        $this->users = $users;
    }

    /**
     * @param UsersRecipeListQueryParameters $parameters
     * @return RecipeListView
     */
    public function query(UsersRecipeListQueryParameters $parameters)
    {
        $user = $this->users->getById($parameters->userId);
        if ($user === null) {
            throw new \InvalidArgumentException('User with id: '. $parameters->userId .' not found');
        }
        $recipes = $this->recipes->getByUser($user);
        $data = [];

        foreach ($recipes as $recipe) {
            $data[] = RecipeListItemView::createFromRecipe($recipe);
        }

        return new RecipeListView(count($data), $data);
    }
}