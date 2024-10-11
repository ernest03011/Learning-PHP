<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models;
use App\FileUploadHelper;
use App\Request;
use App\Exceptions\FileNotValidException;

class TransactionsController{

  private $fileUploadHelper;
  private $transactionsModel;
  private $request;

  public function __construct() 
  {
    $this->fileUploadHelper = new FileUploadHelper();
    $this->transactionsModel = new Models\TransactionsModel();
    $this->request = new Request();

  }

  public function uploadTransactions() : View
  {

    try {
      $fileNames = $this->fileUploadHelper->handleUpload();
      // TODO - Avoid using hard-coded path. 
      // TODO - Refactor this method later on. 

      $this->fileUploadHelper->validateFilePath($fileNames, STORAGE_PATH);
      $this->transactionsModel->saveTransaction($fileNames);
      
      return $this->displayAllTransactions();    

    } catch (FileNotValidException $e) {
        return View::make('error/file.error', ['message' => $e->getMessage()]);

    } catch (\Exception $e){
        return View::make('error/general.error');

    }

  }
 
  public function showTransaction() : View
  {
    $transactionDescription = $this->request->handle('get', 'description');

    $transaction = $this->transactionsModel->getTransaction($transactionDescription);
    return View::make('transactions/display.transaction.view', 
      [
        'transaction' => $transaction
      ]);
  } 

 
  public function showTransactionUploadPage() : View
  {
      return View::make('transactions/create.view');
  }
 
  public function displayAllTransactions() : View
  {
    
    [$transactions, $totals] = $this->transactionsModel->getAllTransactions();
    return View::make('transactions/show.view', 
      [
        'transactions' => $transactions, 
        'totals'=> $totals
      ]);
  }
}