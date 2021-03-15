<?php

class PasswordStrengthTest extends \PHPUnit\Framework\TestCase
{
    protected $password_check;

    public function setup():void {
        $this->password_check = new \App\Libraries\PasswordStrength;
    }
    

    /** @test */
    public function returns_a_number():void {

        $password_index = $this->password_check->generate("password");

        $this->assertIsNumeric($password_index);
    }

        /** @test */
    public function returns_a_number_that_increases_with_password_complexity():void {

        $password_index1 = $this->password_check->generate("password");
        $password_index2 = $this->password_check->generate("Password");
        $password_index3 = $this->password_check->generate("Passw4rd");
        $password_index4 = $this->password_check->generate("P@ssw4rd");
        $password_index5 = $this->password_check->generate('fgtTH@34_ghyYY34$sd');
        

        $this->assertTrue($password_index5 > $password_index4);
        $this->assertTrue($password_index4 > $password_index3);
        $this->assertTrue($password_index3 > $password_index2);
        $this->assertTrue($password_index2 > $password_index1);
    }

    /** @test */
public function no_parameter_passed_throws_exception():void {

    $this->expectException(\App\Libraries\Exceptions\PasswordLengthException::class);

    $password_index = $this->password_check->generate();
    
}

     
    
}

?>