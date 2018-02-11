<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Query\RecipeDetailsQuery;

use Cookway\Infrastructure\QueryParametersInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Parameters of recipe details query
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class RecipeDetailsQueryParameters implements QueryParametersInterface
{
    /**
     * Recipe id
     * @var int
     */
    public $id;

    /**
     * @inheritdoc
     */
    public static function fromRequest(Request $request)
    {
        return new self();
    }
}