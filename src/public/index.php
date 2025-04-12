<?php

declare(strict_types=1);
require_once "../vendor/autoload.php";

use Authentication\Core\UserManager;
use Authentication\User;
use DB\DB;
use protected\Router;

$db = new DB("default_app-db");
$userManager = new UserManager();

//if ($_SERVER["REQUEST_METHOD"] === "POST") {
//    switch ($_POST["action"]) {
//        case "register":
//            $password = $userManager->cryptPassword($_POST["password"]);
//            $user = (new User())
//                ->setUsername($_POST["username"])
//                ->setPassword($password)
//                ->setRoles(["ROLE_USER"]);
//
//            $userManager->createUserToken($user);
//
//            $userId = $db->insert("INSERT INTO users (username, password) VALUES (?, ?)", [$user->getUsername(), $user->getPassword()]);
//            $db->insert("INSERT INTO roles (name, owner_id) VALUES (?, ?)", [$user->getRoles()[0], $userId]);
//
//            break;
//        case "login":
//            $userFromDataBase = $db->select("SELECT * FROM users WHERE username = ?", [$_POST["username"]]);
//            $roles = $db->select("SELECT * FROM roles WHERE owner_id = ?", [$userFromDataBase[0]["id"]]);
//
//            $user = (new User())
//                ->setUsername($userFromDataBase[0]["username"])
//                ->setPassword($userFromDataBase[0]["password"])
//                ->setRoles($roles)
//                ->setEnabled((bool)$userFromDataBase[0]["enabled"]);
//
//            $userManager = new UserManager();
//            if ($userManager->isPasswordValid($user, $_POST["password"])) {
//                $userManager->createUserToken($user);
//            } else {
//                throw new Exception("Invalid username or password");
//            }
//            break;
//    }
//}

$router = new Router($_SERVER);

$router->addRoute('login', function() {
    echo "Welcome back!";
});

$router->run();