<?php

namespace Authentication\Core;

use Authentication\UserInterface;
use Authentication\Token\UserTokenInterface;
use Authentication\Token\UserToken;
use DB\DB;

class UserManager implements UserManagerInterface
{
    use PasswordTrait;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function getUserToken(): ?UserToken
    {
        $userToken = null;
        if ($this->hasUserToken()) {
            $userToken = unserialize($_SESSION[UserTokenInterface::DEFAULT_PREFIX_KEY]);
        }

        return $userToken;
    }

    public function hasUserToken(): bool
    {
        $key = UserTokenInterface::DEFAULT_PREFIX_KEY;
        return (array_key_exists($key, $_SESSION) && unserialize(
                $_SESSION[$key]
            ) !== false);
    }

    public function isGranted(array $roles): bool
    {
        if (!is_null($userToken = $this->getUserToken())) {
            return false;
        }

        if ($userToken->getUser() instanceof UserInterface) {
            return (!empty(array_intersect($roles, $userToken->getUser()->getRoles())));
        }

        return false;
    }

    public function createUserToken(UserInterface $user): UserToken
    {
        $userToken = new UserToken($user);
        $_SESSION[UserTokenInterface::DEFAULT_PREFIX_KEY] = $userToken->serialize();

        return $userToken;
    }

    public function logout(): void
    {
        if ($this->hasUserToken()) {
            unset($_SESSION[UserTokenInterface::DEFAULT_PREFIX_KEY]);
        }
    }
}