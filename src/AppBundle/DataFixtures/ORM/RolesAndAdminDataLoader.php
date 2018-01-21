<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace AppBundle\DataFixtures\ORM;

use Cookway\Domain\Core\Role;
use Cookway\Domain\Core\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RolesAndAdminDataLoader extends Fixture implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $encoder = $this->container->get('security.password_encoder');

        $userRole = new Role('ROLE_USER');
        $adminRole = new Role('ROLE_ADMIN');
        $user = new User('admin');
        $user->addRole($adminRole);
        $user->setPassword($encoder->encodePassword($user, 'asdasd'));

        $manager->persist($userRole);
        $manager->persist($adminRole);
        $manager->persist($user);

        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}