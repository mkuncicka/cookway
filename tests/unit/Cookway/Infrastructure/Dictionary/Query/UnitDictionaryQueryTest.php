<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace tests\unit\Cookway\Infrastructure\Dictionary\Query;

use Cookway\Application\Dictionary\DictionaryListItemView;
use Cookway\Application\Dictionary\DictionaryListView;
use Cookway\Application\Dictionary\Query\UnitDictionaryQueryParameters;
use Cookway\Domain\Recipe\Unit;
use Cookway\Domain\Recipe\Units;
use Cookway\Infrastructure\Dictionary\UnitDictionaryQuery;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * UnitDictionaryQuery unit tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class UnitDictionaryQueryTest extends TestCase
{
    /**
     * @var MockObject
     */
    private $units;

    /**
     * @var UnitDictionaryQuery
     */
    private $testObject;

    public function setUp()
    {
        $this->units = $this->createMock(Units::class);
        $this->testObject = new UnitDictionaryQuery($this->units);
    }

    /**
     * @test
     */
    public function shouldPass()
    {
        $parameters = $this->createMock(UnitDictionaryQueryParameters::class);
        $units = [];
        $unit = $this->createMock(Unit::class);
        $unit->id = 1;
        $unit->name = 'unit';
        $units[] = $unit;
        $this->units->expects($this->once())->method('getAll')->willReturn($units);
        $result = $this->testObject->query($parameters);

        $this->assertInstanceOf(DictionaryListView::class, $result);
        $this->assertInstanceOf(DictionaryListItemView::class, $result->data[0]);
        $this->assertCount(1, $result->data);
        $this->assertEquals(1, $result->totalCount);
    }
}