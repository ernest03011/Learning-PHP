<?php 

declare(strict_types=1);

use App\Controllers;

$router
    ->get('/', [Controllers\HomeController::class, 'index']);

$router
    ->get('/test', [Controllers\TestsControllers::class, 'test']);

$router
    ->get('/transactions', [Controllers\TransactionsController::class, 'displayAllTransactions']);

$router
    ->post('/transactions', [Controllers\TransactionsController::class, 'uploadTransactions']);

$router
    ->get('/transactions/create', [Controllers\TransactionsController::class, 'showTransactionUploadPage']);

$router
    ->get('/transactions/show', [Controllers\TransactionsController::class, 'showTransaction']);

