<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe;

use Cookway\Domain\Recipe\Ingredient;
use Cookway\Domain\Recipe\Ingredients;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Ingredient repository
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class DoctrineIngredientsRepository implements Ingredients
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var ObjectRepository
     */
    private $repository;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Ingredient::class);
    }

    /**
     * @inheritdoc
     */
    public function add(Ingredient $ingredient)
    {
        $this->entityManager->persist($ingredient);
    }

    /**
     * @inheritdoc
     */
    public function getById($id)
    {
        return $this->repository->find($id);
    }
}