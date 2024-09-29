<?php 

declare(strict_types=1);

namespace App;
use App\Validator;
use App\Exceptions\FileNotValidException;

class FileUploadHelper{

    public function handleUpload() : array
    {
      $names= [];
      $files = $_FILES["transactions_file"];

      $this->validateFiles($files);

      $amountOfFiles = count($files["name"]);
  
      for ($i=0; $i < $amountOfFiles; $i++) { 

        if($files["error"][$i] == UPLOAD_ERR_OK)
        {
                $tmp_name = $files["tmp_name"][$i];
                $name = basename($files["name"][$i]);
                move_uploaded_file($tmp_name, STORAGE_PATH . $name);  
        }
    
        $names[] = $name;
    
      }

      return $names;
    } 

    private function validateFiles(array $files ) : void
    {
      $areFilesValid =  (new Validator)->files($files);

      if($areFilesValid === False){
        throw new FileNotValidException();
      }


    }
}