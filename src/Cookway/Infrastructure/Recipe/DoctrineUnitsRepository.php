<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe;

use Cookway\Domain\Recipe\Unit;
use Cookway\Domain\Recipe\Units;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Units repository
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class DoctrineUnitsRepository implements Units
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repository;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Unit::class);
    }

    /**
     * @inheritdoc
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @inheritdoc
     */
    public function getById(int $id)
    {
        return $this->repository->find($id);
    }
}