<?php

declare(strict_types=1);

namespace App\Models;

class TransactionsModel {

 public function saveTransaction(string $fileName) : void
 {

  $transactions = $this->parseCVSFile($fileName);
  $data = $this->transformCSVRow($transactions);

  echo "<pre>";
  var_dump($data);
  echo "</pre>";
  exit;

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

  [$date, $checkNumber, $description, $amount] = $transactions;

  $amount = (float) str_replace(['$', ','], '', $amount);

  return[
    'date' => $date,
    'checkNumber' => $checkNumber,
    'description' => $description,
    'amount' => $amount
  ];

 }

 public function extractTransactions() 
 {

 }

 public function getAllTransactions() {
  
 }


}