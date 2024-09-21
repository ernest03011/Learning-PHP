<?php

declare(strict_types=1);

function dd(string | array $data) : void
{

  if(is_array($data)){
    foreach ($data as $value) {
      echo "<pre>";
      var_dump($value);
      echo "</pre>";
    }
    exit;
  }

  echo "<pre>";
  echo $data;
  echo "</pre>";
  exit;

}