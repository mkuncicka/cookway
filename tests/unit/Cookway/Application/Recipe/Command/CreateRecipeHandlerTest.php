<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace tests\unit\Cookway\Application\Recipe\Command;


use Cookway\Application\Recipe\Command\CreateIngredient;
use Cookway\Application\Recipe\Command\CreateRecipe;
use Cookway\Application\Recipe\Command\CreateRecipeHandler;
use Cookway\Domain\Core\User;
use Cookway\Domain\Recipe\Ingredients;
use Cookway\Domain\Recipe\Recipes;
use Cookway\Domain\Recipe\Unit;
use Cookway\Domain\Recipe\Units;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * CreateRecipeHandler unit tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>1
 */
class CreateRecipeHandlerTest extends TestCase
{
    /**
     * @var MockObject
     */
    private $recipes;

    /**
     * @var MockObject
     */
    private $units;

    /**
     * @var MockObject
     */
    private $ingredients;

    /**
     * @var CreateRecipeHandler
     */
    private $testObject;

    /**
     * @var MockObject
     */
    private $command;

    protected function setUp()
    {
        parent::setUp();
        $this->recipes = $this->createMock(Recipes::class);
        $this->units = $this->createMock(Units::class);
        $this->ingredients = $this->createMock(Ingredients::class);
        $this->command = $this->createMock(CreateRecipe::class);
        $this->testObject = new CreateRecipeHandler($this->recipes, $this->units, $this->ingredients);
    }

    /**
     * @test
     */
    public function shouldPass()
    {
        $this->command->title = 'title';
        $this->command->prescription = 'prescription';
        $this->command->user = $this->createMock(User::class);
        $this->command->unitId = 1;
        $ingredient = $this->createMock(CreateIngredient::class);
        $ingredient->name = 'name';
        $ingredient->amount = 0.5;
        $ingredient->unitId = 1;

        $unit = $this->createMock(Unit::class);

        $this->command->ingredients = [$ingredient];

        $this->recipes->expects($this->once())->method('add');
        $this->ingredients->expects($this->once())->method('add');
        $this->units->expects($this->once())->method('getById')->willReturn($unit);

        $result = $this->testObject->handle($this->command);

        $this->assertNull($result);
    }

}