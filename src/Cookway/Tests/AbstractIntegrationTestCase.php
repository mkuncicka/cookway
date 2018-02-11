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
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides methods for integration tests
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
abstract class AbstractIntegrationTestCase extends KernelTestCase
{
    /**
     * @var string
     */
    protected static $initSqlFilePath;

    /**
     * @var string
     */
    protected static $purgeSqlFilePath;

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
        static::bootKernel([
            'environment' => 'test'
        ]);
        static::$container = static::$kernel->getContainer();
        static::$initSqlFilePath = static::$container->getParameter('init_sql_file_path');
        static::$purgeSqlFilePath = static::$container->getParameter('purge_sql_file_path');
        static::$entityManager = static::$container->get('doctrine.orm.entity_manager');
    }

    public function setUp($path = null)
    {
        parent::setUp();
        if ($path === null) {
            $path = self::$initSqlFilePath;
        }
        $fileContent = file_get_contents($path);

        $sqls = explode(';', $fileContent);
        foreach ($sqls as $sql) {
            if ($sql !== '') {
                $statement = self::$entityManager->getConnection()->prepare($sql);
                $statement->execute();
            }
        }
    }

    public function tearDown($path = null)
    {
        parent::tearDown();
        if ($path === null) {
            $path = self::$purgeSqlFilePath;
        }
        $fileContent = file_get_contents($path);

        $sqls = explode(';', $fileContent);

        foreach ($sqls as $sql) {
            if ($sql !== '') {
                $statement = self::$entityManager->getConnection()->prepare($sql);
                $statement->execute();
            }
        }
    }
}