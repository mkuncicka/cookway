<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe;

use Cookway\Domain\Core\User;
use Cookway\Domain\Recipe\Recipe;
use Cookway\Domain\Recipe\Recipes;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineRecipesRepository implements Recipes
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

    /**
     * @inheritdoc
     */
    public function add(Recipe $recipe)
    {
        $this->entityManager->persist($recipe);
    }

    /**
     * Returns all Recipes
     *
     * @return Recipe[]
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }

    /**
     * Returns recipe identified by given id
     * @param int $id
     * @return Recipe|null
     */
    public function getById(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * Returns all recepies of one user
     * @param User $user
     * @return Recipe[]
     */
    public function getByUser(User $user)
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('r')
            ->from(Recipe::class, 'r')
            ->where('r.author = :user' )
            ->setParameter('user', $user)
        ;

        return $qb->getQuery()->execute();
    }
}