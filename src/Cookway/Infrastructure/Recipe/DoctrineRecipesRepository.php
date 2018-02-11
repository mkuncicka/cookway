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

/**
 * Recipes repository
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
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

    /**
     * @param EntityManagerInterface $entityManager
     */
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

    /**
     * @inheritdoc
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