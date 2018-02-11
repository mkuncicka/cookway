<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Dictionary;

/**
 * View model of dictionary list
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class DictionaryListView
{
    /**
     * @var integer
     */
    public $totalCount;

    /**
     * @var DictionaryListItemView[]
     */
    public $data;

    /**
     * @param int $totalCount
     * @param DictionaryListItemView[] $data
     */
    public function __construct(int $totalCount, array $data)
    {
        $this->totalCount = $totalCount;
        $this->data = $data;
    }
}