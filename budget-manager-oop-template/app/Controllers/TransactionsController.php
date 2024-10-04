<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models;
use App\FileUploadHelper;

class TransactionsController{

  public function uploadTransactions() : View
  {

    $fileNames = (new FileUploadHelper)->handleUpload();
    

    foreach ($fileNames as $fileName) {    
      
      $filePath = STORAGE_PATH . $fileName;
  
  
      if(! file_exists($filePath)){
        trigger_error('File "' . $filePath . '" does not exist', E_USER_ERROR);
      }
    }


    $result = (new Models\TransactionsModel)->saveTransaction($fileNames);
  
    if($result){
      return $this->displayAllTransactions();
    }
  }
 
  public function showTransaction() : View
  {
    $transaction_description = $_GET['desc'];

    $transaction = (new Models\TransactionsModel)->getTransaction($transaction_description);
    return View::make('transactions/display.transaction.view', 
      [
        'transaction' => $transaction
      ]);
  } 

  public function showTransactionUploadPage(): View
  {
      return View::make('transactions/create.view');
  }
 
  public function displayAllTransactions() : View
  {

    [$transactions, $totals] = (new Models\TransactionsModel)->getAllTransactions();
    return View::make('transactions/show.view', 
      [
        'transactions' => $transactions, 
        'totals'=> $totals
      ]);
  }

}