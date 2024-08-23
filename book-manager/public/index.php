<?php 

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);

define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

define('FILES_PATH', $root . 'files' . DIRECTORY_SEPARATOR);

require APP_PATH . 'helpers.php';
require APP_PATH . 'App.php';

require APP_PATH . 'router.php';

setTimeZone();

handleRoute();


// A function to handle all of these IF STATEMENTS :: REQUESTS

// if($_SERVER['REQUEST_URI'] === '/'){

//   $files = getFiles(FILES_PATH);

//   $books = [];
//   $borrowed_books = [];

//   foreach ($files as $file) {
//     $fileName = basename($file);

//     if($fileName === 'books.csv'){
//       $books[] = getBooks($file);
//     }

//     if($fileName === 'borrowed_books.csv'){
//       $borrowed_books[] = getBooks($file);
//     }

//   }

//   $books_to_display = displayAllBooks($books, $borrowed_books);

//   require VIEWS_PATH . 'index.view.php';
//   exit;
// }

// if( isset($_GET['borrow'])){
//   $title = $_GET['borrow'];
  
//   require VIEWS_PATH . 'borrow.view.php';
  
//   exit;
// }

// if( isset($_GET['return'])){
//   $title = $_GET['return'];
  
//   require VIEWS_PATH . 'return.view.php';
  
//   exit;
// }

// if( (isset($_GET['page']) ) && ($_GET['page'] === 'return') && ($_SERVER['REQUEST_METHOD'] === 'POST') ){
//   $title = $_POST['title'];
  
//   require APP_PATH . 'process_return.php';
  
//   exit;
// }

// if( ($_SERVER['REQUEST_URI'] === '/index.php') && ($_SERVER['REQUEST_METHOD'] === 'POST')){

//   require APP_PATH . 'process_borrow.php';
//   exit;
// }



// echo "PAGE NOT FOUND: 404 ERROR";