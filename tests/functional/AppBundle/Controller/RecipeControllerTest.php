<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace AppBundle\Controller;

use Cookway\Tests\AbstractFunctionalTestCase;

class RecipeControllerTest extends AbstractFunctionalTestCase
{
    /**
     * @test
     */
    public function testCreateRecipe()
    {
        $method = 'POST';
        $path = '/api/recipes';
        $params = [];
        $content = [
            "title" => "New Recipe",
            "ingredients" => [
                [ "name" => "new ingredient", "amount" => 2, "unitId" => 1]
            ], 
            "description" => "new recipe",
            "prescription" => "new prescription",
            "preparationTime" => 30,
        ];

        self::authenticate('admin');

        self::$client->request($method, $path, $params, [], [], json_encode($content));
        $response = self::$client->getResponse();

        $this->assertEquals(204, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function testGetRecipeList()
    {
        $method = 'GET';
        $path = '/api/recipes';

        self::authenticate('admin');

        self::$client->request($method, $path);
        $response = self::$client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function testGetRecipeDetails()
    {
        $method = 'GET';
        $path = '/api/recipes/1';

        self::authenticate('admin');

        self::$client->request($method, $path);
        $response = self::$client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function testGetUserRecipeList()
    {
        $method = 'GET';
        $path = '/api/recipes/users/1';

        self::authenticate('admin');

        self::$client->request($method, $path);
        $response = self::$client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }
}