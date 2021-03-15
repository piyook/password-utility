<?php

class PasswordControllerTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function returns_a_plain_password_object_if_passed_plain_parameter_in_array(){

        $passwordUtility = new \App\Controller\PasswordUtility;

        $passwordHandler = $passwordUtility->handler("plain");

        $this->assertInstanceOf(\App\Libraries\PlainPassword::class, $passwordHandler);
    }

    /** @test */
    public function returns_a_mixed_password_object_if_passed_mixed_parameter_in_array(){

        $passwordUtility = new \App\Controller\PasswordUtility;

        $passwordHandler = $passwordUtility->handler("mixed");

        $this->assertInstanceOf(\App\Libraries\MixedPassword::class, $passwordHandler);
    }

    /** @test */
    public function returns_a_password_strength_object_if_passed_null(){

        $passwordUtility = new \App\Controller\PasswordUtility;

        $passwordHandler = $passwordUtility->handler();

        $this->assertInstanceOf(\App\Libraries\PasswordStrength::class, $passwordHandler);
    }

    
/** @test */
public function returns_a_password_of_correct_length_and_no_symobols_if_plain_option_chosen(){

    $passwordUtility = new \App\Controller\PasswordUtility;

    $password = $passwordUtility->handler("plain")->generate(9);

    $this->assertEquals(9,strlen($password));
    $this->assertMatchesRegularExpression('/^[a-zA-z0-9]+$/', $password);
}

/** @test */
public function returns_a_password_index_if_called_from_controller_using_null(){

    $passwordUtility = new \App\Controller\PasswordUtility;

    $password = $passwordUtility->handler()->generate("passW0rd!");

    $this->assertIsInt($password);
}



}

?>