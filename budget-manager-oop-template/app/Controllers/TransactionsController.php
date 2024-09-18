<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models;
use App\FileUploadHelper;

class TransactionsController{

  // Handle multiple files being uploaded. 
  public function uploadTransactions() : View
  {

    $fileName = FileUploadHelper::handleUpload();

    $filePath = STORAGE_PATH . $fileName;
    if(! file_exists($filePath)){
      trigger_error('File "' . $filePath . '" does not exist', E_USER_ERROR);
    }

    $result = (new Models\TransactionsModel)->saveTransaction($fileName);
  
    if($result){
      return View::make('transactions/show.view');
    }
  }

  // Show one Transaction Only. 
  public function showTransaction() : View
  {

    return View::make('');
  } 

  public function showTransactionUploadPage(): View
  {
      return View::make('transactions/create.view');
  }
 
  public function displayAllTransactions() : View
  {
    // Passing the Transactions using this Make method
    return View::make('transactions/show.view');
  }

}