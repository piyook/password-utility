<?php

namespace App\Libraries\Exceptions;

class PasswordHandlerException extends \Exception
{
    public function errorMessage() {
        //error message
        $errorMsg = 'ERROR: Password Handler Requires Input Parameter';
        return $errorMsg;
      }
}



?>