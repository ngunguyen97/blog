<?php

namespace App\Exceptions;

use Exception;

class CustomersException extends Exception
{
    public function render($request)
    {
        return response()->view('errors.customer');
    }
}
