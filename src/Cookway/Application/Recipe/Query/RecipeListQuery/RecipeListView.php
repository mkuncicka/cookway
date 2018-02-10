<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Query\RecipeListQuery;

/**
 * Recipe list view model
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeListView
{
    /**
     * @var integer
     */
    public $totalCount;

    /**
     * @var RecipeListItemView[]
     */
    public $data;

    public function __construct($totalCount, $data)
    {
        $this->totalCount = $totalCount;
        $this->data = $data;
    }

}