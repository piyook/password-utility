<?php

namespace App\Controller;

use App\Libraries\PasswordAbstract;
use App\Libraries\Exceptions\PasswordHandlerException;

/**
 * PasswordUtility: Returns an object of the required class based on input
 */
class PasswordUtility extends PasswordAbstract{
    
    /**
     * handler: return an object of either MixedPassword or PlainPassword class if appropriate string 
     * is passed or PasswordStrength if null passed
     *
     * @param  mixed $options
     * @return void
     */
    public function handler($options=null): object{

        if ($options===null){
            throw new PasswordHandlerException;
        }

        if (gettype($options) === 'string'){

            $this->checkValidInputString($options);

            if ($options==='plain') {
                return new \App\Libraries\PlainPassword;
            }
            
            if ($options==='mixed') {
                return new \App\Libraries\MixedPassword;
            }

            if ($options==='assessment') {
                return new \App\Libraries\PasswordStrength;
            }
          
        }

    }

}

?>