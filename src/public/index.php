<?php

declare(strict_types=1);
require_once "../vendor/autoload.php";

use Authentication\Core\UserManager;
use Authentication\User;
use DB\DB;
use protected\Router;
use protected\controllers\HomeController;
use protected\controllers\AuthController;

const VIEW_PATH = __DIR__ . "/protected/view/";

$db = new DB("default_app-db");


$router = new Router();
$router->addRoute('GET', '/', [HomeController::class, 'home']);
$router->addRoute('GET', '/auth', [AuthController::class, 'authPage']);
$router->addRoute('POST', '/register', [AuthController::class, 'register']);
$router->addRoute('POST', '/login', [AuthController::class, 'login']);


$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$router->dispatch($path);