<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class TransactionsController{

  // Handle multiple files being uploaded. 
  public function uploadCSV() : void
  {

  }

  public function showTransactions() : void
  {
  } 

  public function createTransaction(): View
  {
      return View::make('transactions/create.view');
  }

}