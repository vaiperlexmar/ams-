<?php

namespace protected\controllers;

use Authentication\Core\UserManagerInterface;
use Views\View;
use Authentication\Core\UserManager;
use Authentication\User;
use DB\DB;

class AuthController
{
    private $db;
    private UserManagerInterface $userManager;

    public function __construct(DB $db, UserManagerInterface $userManager)
    {
        $this->db = $db;
        $this->userManager = $userManager;
    }

    public function authPage(): void
    {
        echo View::make("form")->render();
    }

    public function register(): void
    {
        $password = $this->userManager->cryptPassword($_POST["password"]);
        $user = (new User())
            ->setUsername($_POST["username"])
            ->setPassword($password)
            ->setRoles(["ROLE_USER"]);

        $this->userManager->createUserToken($user);

        $userId = $this->db->insert("INSERT INTO users (username, password) VALUES (?, ?)", [$user->getUsername(), $user->getPassword()]);
        $this->db->insert("INSERT INTO roles (name, owner_id) VALUES (?, ?)", [$user->getRoles()[0], $userId]);
    }

    public function login(): void
    {
        $userFromDataBase = $this->db->select("SELECT * FROM users WHERE username = ?", [$_POST["username"]]);
        $roles = $this->db->select("SELECT * FROM roles WHERE owner_id = ?", [$userFromDataBase[0]["id"]]);

        $user = (new User())
            ->setUsername($userFromDataBase[0]["username"])
            ->setPassword($userFromDataBase[0]["password"])
            ->setRoles($roles)
            ->setEnabled((bool)$userFromDataBase[0]["enabled"]);

        if ($this->userManager->isPasswordValid($user, $_POST["password"])) {
            $this->userManager->createUserToken($user);
        } else {
            throw new Exception("Invalid username or password");
        }
    }
}