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

class RecipeDetailsQueryParameters implements QueryParametersInterface
{
    /**
     * Recipe id
     * @var int
     */
    public $id;

    /**
     * Creates QueryParameters class from Request
     * @param Request $request
     * @return $this
     */
    public static function fromRequest(Request $request)
    {
        return new self();
    }
}