<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Tests;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractFunctionalTestCase extends WebTestCase
{
    /**
     * @var ContainerInterface
     */
    protected static $container;
    /**
     * @var Client
     */
    protected static $client;

    /**
     * @var EntityManagerInterface
     */
    protected static $entityManager;

    public function __construct()
    {
        parent::__construct();
        static::$client = static::createClient();
        static::$container = static::$kernel->getContainer();
        static::$entityManager = static::$container->get('doctrine.orm.entity_manager');
    }

    protected static function authenticate($username)
    {
        self::$client->getCookieJar()->clear();
        $tokenEncoder = self::$container->get('lexik_jwt_authentication.encoder');
        $token = $tokenEncoder->encode([
            'username' => $username
        ]);
        self::$client->getCookieJar()->set(new Cookie('BEARER', $token));
    }
}