<?php

declare(strict_types=1);
require_once "../vendor/autoload.php";

use Authentication\Core\UserManager;
use Authentication\User;
use DB\DB;

$db = new DB("default_app-db");
$userManager = new UserManager();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_POST);

    $password = $userManager->cryptPassword($_POST["password"]);
    $user = (new User())
        ->setUsername($_POST["username"])
        ->setPassword($password)
        ->setRoles(["ROLE_USER"]);

    $userManager->createUserToken($user);

    $lastId = $db->insert("INSERT INTO users (username, password) VALUES (?, ?)", [$user->getUsername(), $user->getPassword()]);

    var_dump($userManager->getUserToken());
    var_dump($lastId);
}

