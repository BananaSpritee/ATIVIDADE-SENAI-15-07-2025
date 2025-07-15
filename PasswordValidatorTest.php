<?php
// Arquivo: PasswordValidatorTest.php

use PHPUnit\Framework\TestCase;

require_once 'PasswordValidator.php';

class PasswordValidatorTest extends TestCase
{

    public function testIsValid(){

        $dataProvider = [
            "Abc123!" => false,
            "abcdefgh" => false,
            "ABCDEFGH" => false,
            "abcdEFGH" => false,
            "abcdEFG1" => false,
            "Abcd1234" => false,
            "Abcd1234!" => true,
            "Password1$" => true,
            'Pa$$w0rd' => true,
            "12345678" => false,
            "!@#$%^&*" => false,
            "Password" => false,
        ];

        foreach($dataProvider as $password => $expected){

            $validator = new PasswordValidator($password);
            $isValid = $validator->Isvalid();
            $this->assertEquals($expected, $isValid);

        }

    }

}
