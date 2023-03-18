<?php

namespace Validation;

class Validator
{
    public function isPasswordsEqual($password, $passwordConfirmation): bool
    {
        return $password == $passwordConfirmation;
    }

    public function isEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function isEmailUnique($users, $email): bool
    {
        $unique = true;
        foreach ($users as $user) {
            if ($user['email'] == $email) {
                $unique = false;
            }
        }
        return $unique;
    }

    public function hasErrors(array $errors): bool
    {
        $hasErrors = false;

        foreach ($errors as $error) {
            if (!$error) {
                $hasErrors = true;
                break;
            }
        }
        return $hasErrors;
    }
}