<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

if($_SERVER['REQUEST_URI'] === '/'){
  require VIEWS_PATH . 'app.view.php';
  exit;
}

if ( (isset($_GET['action'])) && ($_GET['action'] === 'form_handler') ) {
  require APP_PATH . 'form_handler.php';
  exit;
}

