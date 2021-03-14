<?php

namespace App\Libraries;
// use App\Exceptions\PasswordLengthException;
/**
 * Password: class to handle password generation containing just letter and numbers
 */
class PlainPassword extends PasswordAbstract implements PasswordInterface{
    
    /**
     * generate: method to return a random plain text password 
     * of the specified length in $options[0]
     * @param  mixed $options
     * @return string
     */
    public function generate(array $options = []){
        
        $this->checkValidInput($options);

        $key="abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $password_length = $options[0];

        return $this->generate_password($password_length, $key);

    }
}


?>