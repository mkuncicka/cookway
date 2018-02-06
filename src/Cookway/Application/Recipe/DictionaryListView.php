<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe;

/**
 * View model of dictionary list
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

    public function __construct($totalCount, $data)
    {
        $this->totalCount = $totalCount;
        $this->data = $data;
    }
}