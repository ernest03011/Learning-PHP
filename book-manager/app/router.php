<?php

declare(strict_types=1);

function getURI() : string
{
  $uri = $_SERVER['REQUEST_URI'];
  
  if($uri === '/'){
    return "/"; 
  }

  $path = parse_url($uri, PHP_URL_PATH);
  return basename($path);
}

function getRequestMethod() : string
{
  return $_SERVER['REQUEST_METHOD'];
}

function handleRoute() : void
{
  $routes = [
    '/' => 'index',
    'index' => 'index',
    'borrow' => 'borrow',
    'return' => 'return'
  
  ];

  $fileName = getURI();
  $fileName = strtolower($fileName);

  $requestMethod = getRequestMethod();
  $requestMethod =  strtolower($requestMethod);

  switch ($routes[$fileName]) {
    case 'index':
      displayHomePage();
      break;

    case 'borrow':
      if( $requestMethod === "post"){
        processBorrowRequest();
      }

      if($requestMethod == "get"){
        displayBorrowPage();
      }

      break;
    
    case 'return':
      if($requestMethod === "post"){
        processReturnRequest();
      }

      if($requestMethod === "get"){
        displayReturnPage();
      }

      break;
    
    default:
      echo "PAGE NOT FOUND: 404 ERROR";
      break;
  }
}

function displayHomePage() : void
{

  $files = getFiles(FILES_PATH);

  $books = [];
  $borrowed_books = [];

  foreach ($files as $file) {
    $fileName = basename($file);

    if($fileName === 'books.csv'){
      $books[] = getBooks($file);
    }

    if($fileName === 'borrowed_books.csv'){
      $borrowed_books[] = getBooks($file);
    }

  }

  $books_to_display = displayAllBooks($books, $borrowed_books);

  require VIEWS_PATH . 'index.view.php';
  exit;
}

function displayBorrowPage() : void
{
  $title = $_GET['title'];
  
  require VIEWS_PATH . 'borrow.view.php';
  
  exit;
}

function processBorrowRequest() : void
{
  require APP_PATH . 'process_borrow.php';
  exit;
}

function displayReturnPage() : void
{
  $title = $_GET['title'];
  
  require VIEWS_PATH . 'return.view.php';
  
  exit;
}

function processReturnRequest() : void
{
  $title = $_POST['title'];
  
  require APP_PATH . 'process_return.php';
  
  exit;
}