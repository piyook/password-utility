<?php
namespace App\Libraries;

abstract class PasswordAbstract

{
    /**
     * generate: method to return a random plain text password 
     * of the specified length in $options[0]
     * @param  mixed $options
     * @return string
     */
    public function checkValidInput(array $options){

        if ( empty($options)) {
            throw new Exceptions\PasswordLengthException;
            exit();
        }

        if (gettype($options[0]) !== "integer") {
            throw new Exceptions\PasswordLengthException;
            exit();
        }

        if ($options[0] < 8) {
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

        var_dump($password);
        return $password;
    }

}


?>