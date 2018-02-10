<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Recipe;

/**
 * View model of dictionary item on the list
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class DictionaryListItemView
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $text;

    public function __construct(int $id, string $text)
    {
        $this->id = $id;
        $this->text = $text;
    }
}