<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Core;

use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Representation of Role in Application
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class Role implements RoleInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $role;

    public function __construct($role)
    {
        $this->role = $role;
    }

    /**
     * @inheritdoc
     */
    public function getRole()
    {
        return $this->role;
    }
}