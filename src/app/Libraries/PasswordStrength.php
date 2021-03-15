<?php

namespace App\Libraries;
// use App\Exceptions\PasswordLengthException;
/**
 * Password Strength: class to test strength of password string
 */
class PasswordStrength {
        
        /**
         * assess: method to generate a password strength value and return a strength
         * index between 0 and 100 and a verbal rating
         * @param  string $password
         * @return integer
         */
        public function generate(string $password=null): int{

            if ($password < 6) {
                throw new Exceptions\PasswordLengthException;
                exit();
            }

            $password_strength_index=0;

            //factor that increases exponentially for password length > 8.
            $length_factor = exp(strlen($password)-8)/1000;
 
            //factor that checks for different character counts
            $upper_case_count = preg_match_all('/[A-Z]/', $password);
            $lower_case_count = preg_match_all('/[a-z]/', $password);
            $number_count = preg_match_all('/[0-9]/', $password);
            $symbol_count = preg_match_all('/[!"£$%^&*()@?_\-\+\=~\{\}\[\]]/', $password);

            //checks for number of > 4 consecutive consonants
            $consonant_count = preg_match_all('/(?:(?![aeiou])[a-z]){4,}/', strtolower($password));

            //convert values to weighted factors
            $lower_to_upper_factor = $upper_case_count * $lower_case_count * 10;
            $number_factor = $number_count * 20;
            $symbol_factor = $symbol_count * 50;
            $consonant_factor = $consonant_count * 50;
            
            //sum up factors to give an index and roudn this up
            $password_strength_index = $length_factor 
                                            +  $lower_to_upper_factor  
                                            + $number_factor 
                                            + $symbol_factor 
                                            + $consonant_factor ;

                $password_strength_index = round($password_strength_index);

            return $password_strength_index;
        }
}
?>