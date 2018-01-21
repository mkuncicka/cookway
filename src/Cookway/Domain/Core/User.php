<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Core;

use Cookway\Domain\Recipe\Recipe;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class representing user account
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class User implements UserInterface
{
    /**
     * Id number of the user
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var Recipe[]
     */
    private $recipes;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var Role[]
     */
    private $roles;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    public function addRecipe(Recipe $recipe)
    {
        $this->recipes[] = $recipe;
    }

    public function addRole(\Cookway\Domain\Core\Role $role)
    {
        $this->roles[] = $role;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        $roles = array_map(function($role) {
            return $role->getRole();
        }, $this->roles);

        return $roles;
    }

    /**
     * @inheritdoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritdoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @inheritdoc
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritdoc
     */
    public function eraseCredentials()
    {
        return $this;
    }
}