<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe;

use Cookway\Domain\Recipe\Unit;
use Cookway\Domain\Recipe\Units;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Repository class of Units
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

}