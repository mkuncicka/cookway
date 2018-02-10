<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Core;


use Cookway\Domain\Core\User;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineUserRepository
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
        $this->repository = $entityManager->getRepository(User::class);
    }

    public function getBuUsername(string $username)
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('u')
            ->from(User::class, 'u')
            ->where('u.username = :username')
            ->setParameter('username', $username);

        return $qb->getQuery()->getOneOrNullResult();
    }

}