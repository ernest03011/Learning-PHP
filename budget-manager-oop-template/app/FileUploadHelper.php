<?php 

declare(strict_types=1);

namespace App;

class FileUploadHelper{

  // TODO : Add more validation and security for uploading the file. 
  // Refactor the method to be able to upload multiple files. 

    public static function handleUpload() : string | array
    {
      $names= [];

      foreach ($_FILES["transactions_file"]["tmp_name"] as $key => $value) {

        if($_FILES["transactions_file"]["error"][$key] == UPLOAD_ERR_OK){
            $tmp_name = $_FILES["transactions_file"]["tmp_name"][$key];
            $name = basename($_FILES["transactions_file"]["name"][$key]);
            move_uploaded_file($tmp_name, STORAGE_PATH . $name);  
        }

        $names[] = $name;
      }
  
      return $names;
    } 
}