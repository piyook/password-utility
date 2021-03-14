<?php
namespace App\Libraries;
// use App\Exceptions\PasswordLengthException;
/**
 * MixedPassword: class to handle password generation containing text, numbers and symbols
 */
class MixedPassword extends PasswordAbstract implements PasswordInterface{
    
    public function generate(array $options = []){
        
        $this->checkValidInput($options);

        $key="abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ@@££$$%%!!--_??";
        $password_length = $options[0];

        return $this->generate_password($password_length, $key);

    }
}

?>