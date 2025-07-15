<?php
// Arquivo: PasswordValidator.php

class PasswordValidator
{
    private string $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function isValid(): bool
    {
        $rules = [
            'minLength' => fn($password) => strlen($password) >= 8,
            'hasUppercase' => fn($password) => preg_match('/[A-Z]/', $password),
            'hasNumber' => fn($password) => preg_match('/\d/', $password),
            'hasSpecialChar' => fn($password) => preg_match('/[!@#$%^&*]/', $password),
        ];

        foreach ($rules as $rule) {
            if (!$rule($this->password)) {
                return false;
            }
        }

        return true;
    }
}
