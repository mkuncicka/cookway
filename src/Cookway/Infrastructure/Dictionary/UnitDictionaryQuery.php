<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Dictionary;

use Cookway\Application\Dictionary\DictionaryListItemView;
use Cookway\Application\Dictionary\DictionaryListView;
use Cookway\Domain\Recipe\Unit;
use Cookway\Domain\Recipe\Units;
use Cookway\Infrastructure\QueryInterface;
use Cookway\Infrastructure\QueryParametersInterface;

/**
 * Query class - handles unit dictionary
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class UnitDictionaryQuery implements QueryInterface
{
    /**
     * @var Units
     */
    private $units;

    /**
     * @param Units $units
     */
    public function __construct(Units $units)
    {
        $this->units = $units;
    }

    /**
     * Returns dictionary of available units in system
     *
     * @param QueryParametersInterface $parameters
     * @return DictionaryListView
     */
    public function query(QueryParametersInterface $parameters)
    {
        $units = $this->units->getAll();
        $data = [];

        /** @var Unit $unit */
        foreach ($units as $unit) {
            $data[] = new DictionaryListItemView($unit->getId(), $unit->getName());
        }

        return new DictionaryListView(count($data), $data);
    }
}