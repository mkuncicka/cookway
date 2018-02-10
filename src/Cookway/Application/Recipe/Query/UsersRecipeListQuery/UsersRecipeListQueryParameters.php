<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe\Query\UsersRecipeListQuery;


use Cookway\Infrastructure\QueryParametersInterface;
use Symfony\Component\HttpFoundation\Request;

class UsersRecipeListQueryParameters implements QueryParametersInterface
{
    /**
     * @var int
     */
    public $userId;

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