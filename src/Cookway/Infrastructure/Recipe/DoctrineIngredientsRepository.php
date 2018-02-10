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

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Ingredient::class);
    }

    public function add(Ingredient $ingredient)
    {
        $this->entityManager->persist($ingredient);
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }
}