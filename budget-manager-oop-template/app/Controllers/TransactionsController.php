<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models;

class TransactionsController{

  // Handle multiple files being uploaded. 
  public function uploadTransactions() : void
  {

    $fileName = $this->handleFilesUpload();

    $transactionsArray = $this->getTransactions($fileName);
    $data = $this->extractTransaction($transactionsArray);

    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    exit;
    
  }

  public function handleFilesUpload() : string
  {

    if($_FILES["transactions_file"]["error"] == UPLOAD_ERR_OK){
      $tmp_name = $_FILES["transactions_file"]["tmp_name"];
      $name = basename($_FILES["transactions_file"]["name"]);
      move_uploaded_file($tmp_name, STORAGE_PATH . $name);
    }

    return $name;

  }

  
  public function getTransactions(string $fileName, ?callable $transactionHandler = null) : array 
  {

    $filePath = STORAGE_PATH . $fileName;
    if(! file_exists($filePath)){
      trigger_error('File "' . $filePath . '" does not exist', E_USER_ERROR);
    }

    $file = fopen($filePath, 'r');

    fgetcsv($file);

    $transactions = [];

    while(($transaction = fgetcsv($file)) !== false){

      if($transactionHandler !== null){
        $transaction = $transactionHandler($transaction);
      }

      $transactions[] = $transaction;
    }

    return $transactions;
  }

  public function extractTransaction(array $transactionRow) : array
  {

    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return[
      'date' => $date,
      'checkNumber' => $checkNumber,
      'description' => $description,
      'amount' => $amount
    ];

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