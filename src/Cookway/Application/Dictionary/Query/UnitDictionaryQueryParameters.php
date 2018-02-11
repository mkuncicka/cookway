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

/**
 * Parameters of unit dictionary query
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class UnitDictionaryQueryParameters implements QueryParametersInterface
{

    /**
     * @inheritdoc
     */
    public static function fromRequest(Request $request)
    {
        return new self();
    }
}