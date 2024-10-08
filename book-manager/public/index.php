<?php 

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);

define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

define('FILES_PATH', $root . 'files' . DIRECTORY_SEPARATOR);

require APP_PATH . 'helpers.php';
require APP_PATH . 'App.php';

require APP_PATH . 'router.php';

setTimeZone();

handleRoute();