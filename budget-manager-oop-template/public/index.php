<?php

declare(strict_types = 1);

use App\App;
use App\Config;
use App\Router;

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
require_once $root . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', $root . 'storage' . DIRECTORY_SEPARATOR);
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require_once APP_PATH . 'helpers.php';

$router = new Router();

require_once APP_PATH . "routes.php";

(new App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run(); 