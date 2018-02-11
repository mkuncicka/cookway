<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace AppBundle\Controller;

use Cookway\Tests\AbstractFunctionalTestCase;

class DictionaryControllerTest extends AbstractFunctionalTestCase
{
    /**
     * @test
     */
    public function testUnitDictionary()
    {
        $method = 'GET';
        $path = '/api/dictionary/units';

        self::authenticate('admin');

        self::$client->request($method, $path);
        $response = self::$client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

}