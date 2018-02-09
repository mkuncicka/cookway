<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure;

/**
 * Interface QueryInterface
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
interface QueryInterface
{
    /**
     * Returns queried data
     *
     * @param QueryParametersInterface $parameters
     * @return mixed
     */
    public function query(QueryParametersInterface $parameters);
}