<?php 

declare(strict_types=1);

namespace App;

class Validator{

  private $allowedTypes = ['csv'];
  private $maxFileSize = 2 * 1024 * 1024;


  // This one needs to be updated. 
  // Create a sentence, paragraph to understand the process better. 

  public function files(array $listOfFiles) : bool
  {
    $amountOfFiles = count($listOfFiles['name']);

    for ($i=0; $i < $amountOfFiles; $i++) { 
      
      $fileName = $listOfFiles['name'][$i] ?? "";
      $fileSize = $listOfFiles['size'][$i] ?? "";

      $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

      $isIAllowedType = in_array($fileType, $this->allowedTypes) ? true : false;
      $isAnAllowedSize = $fileSize < $this->maxFileSize ? true : false;

      if($isAnAllowedSize && $isIAllowedType){
        return true;
      }
    }

    return false;
  }

}