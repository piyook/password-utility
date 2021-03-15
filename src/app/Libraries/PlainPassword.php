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
    public function generate(int $password_length = null): string {
        
        $this->checkValidInput($password_length);

        $key="abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        return $this->generate_password($password_length, $key);

    }
}


?>