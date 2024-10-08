<?php

declare(strict_types=1);

namespace App\Models;

use App\App;
use App\Model;
use App\Utilities;

class TransactionsModel extends Model{

  private $transactions = [];
  private $totals = [];
  private $transaction_description = "";
  private $transaction;

 public function saveTransaction(string | array $fileNames) : void
 {

  $transactions = $this->parseCVSFile($fileNames);
  $this->transactions = $this->transformCSVRow($transactions);
  
  if(isset($this->transactions)){
    $this->storeTransactionsOnDB();
  }

 }

 private function parseCVSFile(string | array $fileNames) : array
 {
  
  $fileNames = is_array($fileNames) ? $fileNames : [$fileNames];
  $transactions_total = [];
  foreach ($fileNames as $fileName) {

    $filePath = STORAGE_PATH . $fileName;
    $file = fopen($filePath, 'r');
  
    fgetcsv($file);
    $transactions = [];

    while(($transaction = fgetcsv($file)) !== false){
  
      $transactions[] = $transaction;
    }
    
    $transactions_total[] = $transactions;
  }

  return $transactions_total;
 }

 private function transformCSVRow(array $array_of_array_of_transactions) : array
 {

  $transformedTransactions = [];

  foreach ($array_of_array_of_transactions as $transactions) {

    foreach ($transactions as $transaction) {

      [$date, $checkNumber, $description, $amount] = $transaction;
      $date = Utilities::formatDate($date);
  
      $transaction_type = 'income';
  
      if(! empty($amount)){  
  
        if(substr($amount, 0, 1) === '-'){
          $transaction_type = 'expense';
        }
        
        $amount = (float) str_replace(['$', ',', '-'], '', $amount);
  
      }
          
      $transformedTransactions[] = [
        'transaction_date' => $date,
        'check_number' => $checkNumber,
        'description' => $description,
        'amount' => $amount,
        'transaction_type' => $transaction_type
      ];
    }

  }

  return $transformedTransactions;

 }

 private function storeTransactionsOnDB() : void
 {

  $statement = "
    INSERT INTO transactions 
        (transaction_date, check_number, description, amount, transaction_type)
    VALUES
        (:transaction_date, :check_number, :description, :amount, :transaction_type);
  ";

  $this->db->beginTransaction();

  try {
      $statement = $this->db->prepare($statement);

      foreach ($this->transactions as $transaction) {
        $statement->execute(array(
            'transaction_date' => $transaction['transaction_date'] ?? '2024-09-17',
            'check_number'  => $transaction['check_number'] ?? '000',
            'description'  => $transaction['description'],
            'amount'  => $transaction['amount'],
            'transaction_type' => $transaction['transaction_type'] ?? 'income'
        ));
      }

      $this->db->commit();
  } catch (\PDOException $e) {
    $this->db->rollBack();  
    exit();
  }  

 }


 public function getAllTransactions() : array
 {
  $this->fectAllTransactionsFromDB();
  
  // if(! isset($this->transactions)){
  // return an error if it is not set
  // } 
  $this->calculateTotals();

  return [$this->transactions, $this->totals];
 }

 private function fectAllTransactionsFromDB() : void
 {
  $statement = "
    SELECT
      *
    FROM
      transactions;
  ";

  try {
    $statement = $this->db->query($statement);
    $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
    $this->transactions = $result;

  } catch (\PDOException $e) {
    exit($e->getMessage());
    
  }
 }

 private function calculateTotals() : void
 {
  $totals = [
    'netTotal' => 0,
    'totalIncome' => 0,
    'totalExpense' => 0,
  ];

  foreach ($this->transactions as $transaction) {

    if ($transaction['transaction_type'] === 'income' ) {
      $totals['totalIncome'] += $transaction['amount'];
    }
    if ($transaction['transaction_type'] === 'expense' ) {
      $totals['totalExpense'] += $transaction['amount'];
    }


  }

  $totals['netTotal'] = $totals['totalIncome'] - $totals['totalExpense'];
  $this->totals =  $totals;
 }

 public function getTransaction($transaction_description) : array
 {

  $this->transaction_description = $transaction_description;
  
  $this->transaction = $this->fetchTransactionByDescriptionFromDB();

  return $this->transaction;

 }

 private function fetchTransactionByDescriptionFromDB() : array
 {

  $statement = "
    SELECT
      *
    FROM
      transactions
    WHERE description = :description;
  ";

  try {

    $statement = $this->db->prepare($statement);
    $statement->execute(
      array(
      'description' => $this->transaction_description
      )
    );

    $result = $statement->fetch(\PDO::FETCH_ASSOC);
    return $result;

  } catch (\PDOException $e) {
      exit($e->getMessage());
  } 

 }

}