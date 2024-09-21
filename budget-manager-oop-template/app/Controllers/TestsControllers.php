<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class TestsControllers
{

  public function test(): View
  {
      return View::make('tests.view');
  }

  
}


