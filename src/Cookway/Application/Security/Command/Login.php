<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace Cookway\Application\Security\Command;

use JMS\Serializer\Annotation as Serializer;

/**
 * Intention of login
 *
 * @author Magdalena Kuncicka <mkuncicka@gmail.com>
 */
class Login
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    public $username;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    public $password;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
}