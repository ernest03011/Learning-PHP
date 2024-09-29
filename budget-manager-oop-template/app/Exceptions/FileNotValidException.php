<?php

declare(strict_types = 1);

namespace App\Exceptions;

class FileNotValidException extends \Exception
{
    protected $message = 'File is not valid';
}
