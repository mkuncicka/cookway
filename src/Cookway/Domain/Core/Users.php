<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Domain\Core;

/**
 * User repository interface
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
interface Users
{
    /**
     * Returns user with given username
     *
     * @param string $username
     * @return User
     */
    public function getByUsername(string $username);

    /**
     * Returns user with given id
     *
     * @param int $id
     * @return User
     */
    public function getById(int $id);
}