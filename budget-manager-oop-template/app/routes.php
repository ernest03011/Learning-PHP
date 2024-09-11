<?php 

declare(strict_types=1);

use App\Controllers;

$router
    ->get('/', [Controllers\HomeController::class, 'index']);

$router
    ->get('/test', [Controllers\TestsControllers::class, 'test']);

