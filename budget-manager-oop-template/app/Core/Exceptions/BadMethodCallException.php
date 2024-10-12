<?php

declare(strict_types=1);

namespace App\Core\Exceptions;

class BadMethodCallException extends \Exception
{
    protected $message = 'Method does not Exists';
}
