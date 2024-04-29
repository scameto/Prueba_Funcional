<?php

namespace App\Validation;

class PasswordRules
{
    public function validatePassword(string $str): bool
    {
        return (bool) preg_match('/[A-Z]/', $str) &&
               preg_match('/[a-z]/', $str) &&
               preg_match('/[0-9]/', $str) &&
               preg_match('/[^\da-zA-Z]/', $str);
    }
}


?>