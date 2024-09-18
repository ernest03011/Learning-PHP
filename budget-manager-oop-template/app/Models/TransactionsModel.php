<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use App\Utilities;

class TransactionsModel extends Model{

  private $transactions;

 public function saveTransaction(string $fileName) : bool
 {

  $transactions = $this->parseCVSFile($fileName);
  $this->transactions = $this->transformCSVRow($transactions);
  
  if(isset($this->transactions)){
    $result = $this->storeTransactionsOnDB();

    if(isset($result) && is_int($result)){
      return true;
    }

  }

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

  return $transformedTransactions;

 }

 public function storeTransactionsOnDB(){

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
      return $statement->rowCount();
  } catch (\PDOException $e) {
    $this->db->rollBack();  
    exit($e->getMessage());
  }  

 }

 public function extractTransactions() 
 {

 }

 public function getAllTransactions() {
  $statement = "
    SELECT
      *
    FROM
      transactions;
  ";

  try {
    $statement = $this->db->query($statement);
    $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
    return $result;

  } catch (\PDOException $e) {
    exit($e->getMessage());
    
  }
 }

}