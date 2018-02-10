<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Query\RecipeListQuery;

use Cookway\Infrastructure\QueryParametersInterface;
use Symfony\Component\HttpFoundation\Request;

class RecipeListQueryParameters implements QueryParametersInterface
{
    /**
     * @inheritdoc
     */
    public static function fromRequest(Request $request)
    {
        return new self();
    }
}