<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure;


use Symfony\Component\HttpFoundation\Request;

interface QueryParametersInterface
{
    /**
     * Creates QueryParameters class from Request
     * @param Request $request
     * @return $this
     */
    public static function fromRequest(Request $request);

}