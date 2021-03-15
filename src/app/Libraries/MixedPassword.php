<?php
namespace App\Libraries;
// use App\Exceptions\PasswordLengthException;
/**
 * MixedPassword: class to handle password generation containing text, numbers and symbols
 */
class MixedPassword extends PasswordAbstract implements PasswordInterface{
    
    public function generate(int $password_length = null): string{
        
        $this->checkValidInput($password_length);

        $key="abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ@@££$$%%!!--_??";
    
        return $this->generate_password($password_length, $key);

    }
}

?>