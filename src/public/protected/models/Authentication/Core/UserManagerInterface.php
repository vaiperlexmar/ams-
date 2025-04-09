<?php

namespace Authentication\Core;

use Authentication\Token\UserToken;
use Authentication\UserInterface;

interface UserManagerInterface
{
    public function getUserToken(): ?UserToken;

    public function hasUserToken(): bool;

    public function createUserToken(UserInterface $user): UserToken;

    public function logout(): void;

    public function cryptPassword(string $plainPassword): string;

    public function isPasswordValid(UserInterface $user, string $plainPassword): bool;
}