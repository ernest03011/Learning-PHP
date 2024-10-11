<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\BadMethodCallException;

class Request
{

  public function handle(string $method, string $value = '')
  {

    if (method_exists($this, $method) && is_callable([$this, $method])) {
      return $this->$method($value);

    } else {
      throw new BadMethodCallException();
      
    }
  
  }

  private function get(string $value = '')
  {
    return $_GET[$value];
  }
  
}
