<?php

namespace Authentication\Token;

use Authentication\UserInterface;

class UserToken
{
    private UserInterface $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function serialize()
    {
        return serialize($this);
    }
}