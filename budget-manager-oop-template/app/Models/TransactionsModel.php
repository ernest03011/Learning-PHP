<?php

declare(strict_types=1);

namespace App\Models;

class TransactionsModel {

 public function saveTransaction(string $fileName) : void
 {

  $transactions = $this->parseCVSFile($fileName);
  $data = $this->transformCSVRow($transactions);

 }

 public function parseCVSFile(string $fileName) : array
 {
  $filePath = STORAGE_PATH . $fileName;
  $file = fopen($filePath, 'r');

  fgetcsv($file);

  $transactions = [];

  while(($transaction = fgetcsv($file)) !== false){

    $transactions[] = $transaction;
  }

  return $transactions;
 }

 public function transformCSVRow(array $transactions) : array
 {

  $transformedTransactions = [];

  foreach ($transactions as $transaction) {

    [$date, $checkNumber, $description, $amount] = $transaction;

    $transaction_type = 'income';

    if(! empty($amount)){  

      if(substr($amount, 0, 1) === '-'){
        $transaction_type = 'expense';
      }
      
      $amount = (float) str_replace(['$', ',', '-'], '', $amount);

    }
        
    $transformedTransactions[] = [
      'date' => $date,
      'checkNumber' => $checkNumber,
      'description' => $description,
      'amount' => $amount,
      'type' => $transaction_type
    ];

  }

  return $transformedTransactions;

 }

 public function extractTransactions() 
 {

 }

 public function getAllTransactions() {
  
 }


}