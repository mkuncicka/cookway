<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Infrastructure\Recipe;

use Cookway\Domain\Recipe\Photo;
use Cookway\Domain\Recipe\Photos;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Photos repository
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class DoctrinePhotosRepository implements Photos
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
        $this->repository = $entityManager->getRepository(Photo::class);
    }

}