<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class TransactionsController{

  // Handle multiple files being uploaded. 
  public function uploadCSV() : void
  {

  }

  // Show one Transaction Only. 
  public function showTransaction() : View
  {

    return View::make('');
  } 

  public function createTransaction(): View
  {
      return View::make('transactions/create.view');
  }
 
  public function displayAllTransactions() : View
  {
    // Passing the Transactions using this Make method
    return View::make('transactions/show.view');
  }

}