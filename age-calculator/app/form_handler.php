<?php
declare(strict_types=1);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  require APP_PATH . 'App.php';
  $date = $_POST['birth_date'];

  if(! isset($date)){

    $error = "Something went wrong, try again!";
    require VIEWS_PATH . 'app.view.php'; 

    exit;
  }

  // Call the functions to make the calculations
  $age = calculateAge($date); 
  
  if(! $age){
    echo "Wrong Date provided!";
    exit;
  }

  $age = formatAge($age);
  
  // Load the page to show the result. 
  require VIEWS_PATH . 'age_result.php';
}

