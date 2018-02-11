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

/**
 * Parameters of recipe list for single user
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class UsersRecipeListQueryParameters implements QueryParametersInterface
{
    /**
     * @var int
     */
    public $userId;

    /**
     * @inheritdoc
     */
    public static function fromRequest(Request $request)
    {
        return new self();
    }
}