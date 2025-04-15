<?php

declare(strict_types=1);
require_once "../vendor/autoload.php";

use protected\Router;
use protected\controllers\HomeController;
use protected\controllers\AuthController;
use DB\DB;
use Authentication\Core\UserManager;

const VIEW_PATH = __DIR__ . "/protected/view/";

$db = new DB("default_app-db");
$userManager = new UserManager();

$homeController = new HomeController();
$authController = new AuthController($db, $userManager);

$router = new Router();
$router->addRoute('GET', '/', [$homeController, 'home']);
$router->addRoute('GET', '/auth', [$authController, 'authPage']);
$router->addRoute('POST', '/register', [$authController, 'register']);
$router->addRoute('POST', '/login', [$authController, 'login']);

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$router->dispatch($path);

