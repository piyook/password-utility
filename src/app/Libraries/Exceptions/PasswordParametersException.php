<?php

namespace App\Libraries\Exceptions;

class PasswordParametersException extends \Exception
{
    public function errorMessage() {
        //error message
        $errorMsg = 'ERROR: Requires two parameters - password lenght and type';
        return $errorMsg;
      }
}



?>