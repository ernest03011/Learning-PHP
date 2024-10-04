<?php 

declare(strict_types=1);

namespace App;

class Validator{

  private $allowedTypes = ['csv'];
  private $maxFileSize = 2 * 1024 * 1024;


  public function files(array $files) : bool
  {
    $amountOfFiles = count($files['name']);

    for ($i=0; $i < $amountOfFiles; $i++) { 
      
      $fileName = $files['name'][$i] ?? "";
      $fileSize = $files['size'][$i] ?? "";

      $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

      $isIAllowedType = $this->isAllowedType($fileType);
      $isAnAllowedSize = $this->isMaxFileSize($fileSize);

      if($isAnAllowedSize && $isIAllowedType){
        return true;
      }
    }

    return false;
  }

  private function isAllowedType(string | array $fileType) : bool
  {

    return in_array($fileType, $this->allowedTypes) ? true : false;
  }

  private function isMaxFileSize(string $fileSize) : bool
  {

    return $fileSize < $this->maxFileSize ? true : false;

  }

}