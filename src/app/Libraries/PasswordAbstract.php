<?php
namespace App\Libraries;

abstract class PasswordAbstract

{
    /**
     * generate: method to return a random plain text password 
     * of the specified length in $options[0]
     * @param  string $options
     * @return string
     */
    public function checkValidInputString(string $options=null){

        
        if ( empty($options)) {
            throw new Exceptions\PasswordLengthException;
            exit();
        }

        if (gettype($options) !== "string") {
            throw new Exceptions\PasswordLengthException;
            exit();
        }

    }

    public function checkValidInput(int $password_length = null)
    {

        if ( $password_length === null) {
            throw new Exceptions\PasswordLengthException;
            exit();
        }

        if (gettype($password_length) !== "integer") {
            throw new Exceptions\PasswordLengthException;
            exit();
        }

        if ($password_length < 6) {
        throw new Exceptions\PasswordLengthException;
        exit();
        }

        }

          
      /**
       * generate_password: method to generate a random passwors string
       *
       * @param  int $password_length
       * @param  string $key
       * @return string
       */
      public function generate_password($password_length, $key) {
        
        $password = "";   

        for ($count = 0; $count < $password_length; $count++){
            $random_key_pos = rand(0, strlen($key)-1);
            $password .= substr($key, $random_key_pos, 1);
        }

        return $password;
    }

}


?>