<?php

namespace App\Libraries\Exceptions;

class PasswordLengthException extends \Exception
{
    public function errorMessage() {
        //error message
        $errorMsg = 'ERROR: Password too short - this should be at least 6 characters long';
        return $errorMsg;
      }
}



?>