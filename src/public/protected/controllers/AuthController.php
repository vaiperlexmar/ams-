<?php

namespace protected\controllers;

use Views\View;

class AuthController
{
    public function authPage(): void
    {
        echo View::make("form")->render();
    }

    public function registerAction()
    {
        $password = $userManager->cryptPassword($_POST["password"]);
        $user = (new User())
            ->setUsername($_POST["username"])
            ->setPassword($password)
            ->setRoles(["ROLE_USER"]);

        $userManager->createUserToken($user);

        $userId = $db->insert("INSERT INTO users (username, password) VALUES (?, ?)", [$user->getUsername(), $user->getPassword()]);
        $db->insert("INSERT INTO roles (name, owner_id) VALUES (?, ?)", [$user->getRoles()[0], $userId]);
    }

    public function loginAction()
    {
        $userFromDataBase = $db->select("SELECT * FROM users WHERE username = ?", [$_POST["username"]]);
        $roles = $db->select("SELECT * FROM roles WHERE owner_id = ?", [$userFromDataBase[0]["id"]]);

        $user = (new User())
            ->setUsername($userFromDataBase[0]["username"])
            ->setPassword($userFromDataBase[0]["password"])
            ->setRoles($roles)
            ->setEnabled((bool)$userFromDataBase[0]["enabled"]);

        $userManager = new UserManager();
        if ($userManager->isPasswordValid($user, $_POST["password"])) {
            $userManager->createUserToken($user);
        } else {
            throw new Exception("Invalid username or password");
        }
    }
}