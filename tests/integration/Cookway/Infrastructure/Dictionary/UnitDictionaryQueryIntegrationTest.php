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
use Cookway\Application\Dictionary\Query\UnitDictionaryQueryParameters;
use Cookway\Domain\Recipe\Units;
use Cookway\Tests\AbstractIntegrationTestCase;

/**
 * UnitDictionaryQuery integration tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class UnitDictionaryQueryIntegrationTest extends AbstractIntegrationTestCase
{
    /**
     * @var Units
     */
    private $units;

    /**
     * @var UnitDictionaryQuery
     */
    private $testObject;

    public function setUp($path = null)
    {
        parent::setUp($path);
        $this->units = self::$container->get('app.recipe.unit_repository');
        $this->testObject = new UnitDictionaryQuery($this->units);
    }

    /**
     * @test
     */
    public function shouldReturnList()
    {
        $parameters = new UnitDictionaryQueryParameters();
        $result = $this->testObject->query($parameters);

        $this->assertInstanceOf(DictionaryListView::class, $result);
        $this->assertEquals($result->totalCount, count($result->data));
        foreach ($result->data as $dictionaryData) {
            $this->assertInstanceOf(DictionaryListItemView::class, $dictionaryData);
        }
    }
}