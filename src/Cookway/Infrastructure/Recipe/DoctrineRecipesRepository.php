<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe;


use Cookway\Domain\Recipe\Recipe;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineRecipesRepository
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
        $this->repository = $entityManager->getRepository(Recipe::class);
    }

    public function add(Recipe $recipe)
    {
        $this->entityManager->persist($recipe);
    }

}