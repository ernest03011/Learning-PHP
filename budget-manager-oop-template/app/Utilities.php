<?php

declare(strict_types=1);

namespace App;

class Utilities{

  public static function formatDate(string $dateString) : string
  {
  
    $date = \DateTime::createFromFormat('d/m/Y', $dateString);
  
    $formattedDate = $date->format('Y-m-d');
  
    return $formattedDate;
  }

}
