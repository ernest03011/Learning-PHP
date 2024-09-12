<?php

declare(strict_types=1);

namespace App\Controllers\Transactions;

use App\View;

class CreateTransactionController{

  public function index(): View
  {
      return View::make('transactions/create.view');
  }

}