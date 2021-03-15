<?php

namespace App\Controller;

use App\Libraries\PasswordAbstract;

class PasswordUtility extends PasswordAbstract{

    public function handler($options=null){

        if (gettype($options) === 'string'){

            $this->checkValidInputString($options);

            if ($options==='plain') {
                return new \App\Libraries\PlainPassword;
            }
            
            return new \App\Libraries\MixedPassword;
        }

        if ($options === null){
            return new \App\Libraries\PasswordStrength;
        }

    
    }

}

?>