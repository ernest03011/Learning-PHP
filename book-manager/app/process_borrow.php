<?php 

declare(strict_types=1);

$data = [
  'title' => $_POST['book_name'],
  'borrower_name' => $_POST['borrower_name'],
  'borrow_date' => $_POST['borrow_date'],
  'due_date' => $_POST['return_date']
];


if(! isAValidDueDate($data['due_date']) ){

  $errorMessage = "Wrong Date.";
  $url = "/borrow?title=" . urlencode($data['title']) . "&error=" . urlencode($errorMessage);
  
  header("Location: {$url}");
  exit;
}

$filePath = FILES_PATH . 'borrowed_books.csv';

borrowABook($data, $filePath);

header("Location: /");
exit;