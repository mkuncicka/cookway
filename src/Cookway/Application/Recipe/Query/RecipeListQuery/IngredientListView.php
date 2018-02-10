<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Query\RecipeListQuery;


class IngredientListView
{
    /**
     * @var integer
     */
    public $totalCount;

    /**
     * @var IngredientListItemView[]
     */
    public $data;

    public function __construct($totalCount, $data)
    {
        $this->totalCount = $totalCount;
        $this->data = $data;
    }

}