<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Dictionary\Query;

use Cookway\Infrastructure\QueryParametersInterface;
use Symfony\Component\HttpFoundation\Request;

class UnitDictionaryQueryParameters implements QueryParametersInterface
{

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