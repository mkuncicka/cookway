<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Dictionary;


use Cookway\Application\Recipe\DictionaryListItemView;
use Cookway\Application\Recipe\DictionaryListView;
use Cookway\Domain\Recipe\Unit;
use Cookway\Domain\Recipe\Units;

class UnitDictionaryQuery
{
    /**
     * @var Units
     */
    private $units;

    public function __construct(Units $units)
    {
        $this->units = $units;
    }

    public function query()
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