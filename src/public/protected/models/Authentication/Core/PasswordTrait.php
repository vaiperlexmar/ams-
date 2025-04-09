<?php

namespace Authentication\Core;

use Authentication\UserInterface;

trait PasswordTrait
{
    private $cost = 12;

    public function cryptPassword(string $plainPassword): string
    {
        return password_hash($plainPassword, PASSWORD_BCRYPT, ['cost' => $this->cost]);
    }

    public function isPasswordValid(UserInterface $user, string $plainPassword): bool
    {
        return password_verify($plainPassword, $user->getPassword());
    }

    public function setCost(int $cost): void
    {
        if($cost < 4 || $cost > 12) {
            throw new \InvalidArgumentException("Cost must be between 4 and 12");
        }
        $this->cost = $cost;
    }
}