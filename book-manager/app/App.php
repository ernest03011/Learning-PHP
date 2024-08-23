<?php 

declare(strict_types=1);

function getFiles(string $dirPath) : array
{
  $files = [];

  foreach (scandir($dirPath) as $file) {
    if(is_dir($file)){
      continue;
    }

    $files[] = $dirPath . $file;
  }

  return $files;
}

function getBooks(string $fileName) : array
{
  if(! file_exists($fileName)){
    trigger_error("File '" . $fileName . "' does not exist", E_USER_ERROR);
  }

  $file = fopen($fileName, 'r');

  fgetcsv($file);

  $books = [];

  while(($book = fgetcsv($file)) !== false){
    $books[] = $book;
  }

  return $books;
}

function displayAllBooks(array $books, array $borrowed_books) : array 
{
  $books_to_display = [];

  foreach ($books[0] as $book) {
    $is_borrowed = false;
    $book_name = strtolower(trim($book[0]));

    foreach ($borrowed_books[0] as $borrowed_book) {
      $borrowed_book_name = strtolower(trim($borrowed_book[0]));    
  
      if($book_name === $borrowed_book_name){
        $is_borrowed = true;
        $books_to_display[] = [
          'title' => $borrowed_book[0],
          'is_borrowed' => true,
          'borrower_name' => $borrowed_book[1],
          'request_date' => $borrowed_book[2],
          'due_date' => $borrowed_book[3]
        ];

        break;
      }
      
    }
    
    if(! $is_borrowed){

      $books_to_display[] = [
        'title' => $book[0],
        'is_borrowed' => false,
        'borrower_name' => null,
        'request_date' => null, 
        'due_date' => null
      ];
    }
    

  }

  // dd($books_to_display);

  return $books_to_display;
}

function borrowABook(array $borrowed_book_details, string $filePath) : void
{

  $file = fopen($filePath, 'a');

  fputcsv($file, $borrowed_book_details);

  fclose($file);

}

function returnABook(string $title, string $filePath) : void
{

  $bookTitleToRemove = $title;
  $lines = file($filePath, FILE_IGNORE_NEW_LINES);

  $filteredLines = array_filter($lines, function($line) use ($bookTitleToRemove){
    $data = str_getcsv($line);
    return $data[0] !== $bookTitleToRemove;
  });

  file_put_contents($filePath, implode(PHP_EOL, $filteredLines) . PHP_EOL);
}

function isPastDueDate($due_date) : bool
{

  try {
    $currentDate = new DateTime();
    $currentDate->setTime(0, 0);

    $dueDate = new DateTime($due_date);
    $dueDate->setTime(0, 0);
  } catch (Exception $e) {

      return false;
  }

  return $currentDate > $dueDate;
}

function isAValidDueDate($due_date) : bool
{
    try {
        $currentDate = new DateTime();
        $currentDate->setTime(0, 0);

        $dueDate = new DateTime($due_date);
        $dueDate->setTime(0, 0);
    } catch (Exception $e) {

        return false;
    }

    return $dueDate > $currentDate;
}

function setTimeZone() : void
{
  date_default_timezone_set('America/Santo_Domingo');
}
