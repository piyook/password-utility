<?php

class MixedPasswordTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function generated_password_is_a_string():void {

            $password = new \App\Libraries\MixedPassword;

            $myPassword = $password->generate(8);

            $this->assertIsString($myPassword);

    }

    /** @test */
    public function generated_password_is_correct_length():void {

        $password = new \App\Libraries\MixedPassword;

        $myPassword = $password->generate(10);


        $this->assertEquals(10,strlen($myPassword));
}

/** @test */
public function no_parameters_supplied_to_password_generate_throws_exception():void {

    $this->expectException(\App\Libraries\Exceptions\PasswordLengthException::class);

    $password = new \App\Libraries\MixedPassword;

    $myPassword = $password->generate();
    
}


/** @test */
public function password_length_passed_to_generate_too_short_throws_exception():void {

    $this->expectException(\App\Libraries\Exceptions\PasswordLengthException::class);

    $password = new \App\Libraries\MixedPassword;

    $myPassword = $password->generate(0);
    
}


}