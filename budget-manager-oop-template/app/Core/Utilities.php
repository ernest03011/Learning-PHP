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

  public static function formatDollarAmount(float $amount, string $transaction_type) : string
  {
    $isNegative = false;
    if($transaction_type === 'expense'){
      $isNegative = true;
    }
    return ($isNegative ? '-' : '') . '$' . number_format(abs($amount), 2);
  }

  public static function formatDateOrdinary(string $date) : string
  {
    return date('M j, Y', strtotime($date));
  }

  public static function getColorForTransactionType(string $transaction_type) : string
  {
    $transactionTypeColorMap = [
      'income' => 'green', 
      'expense' => 'red'
    ];

    return $transactionTypeColorMap[$transaction_type] ?? '';
  }

}
