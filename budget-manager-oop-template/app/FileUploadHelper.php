<?php 

declare(strict_types=1);

namespace App;

class FileUploadHelper{

  // TODO : Add more validation and security for uploading the file. 
  // Refactor the method to be able to upload multiple files. 

    public static function handleUpload() : string
    {

      if($_FILES["transactions_file"]["error"] == UPLOAD_ERR_OK){
        $tmp_name = $_FILES["transactions_file"]["tmp_name"];
        $name = basename($_FILES["transactions_file"]["name"]);
        move_uploaded_file($tmp_name, STORAGE_PATH . $name);
      }
  
      return $name;
    } 
}