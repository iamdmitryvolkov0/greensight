<?php

namespace Validation;

class Validator implements ValidatePostInterface, ValidatePasswordInterface, ValidateEmailInterface, ValidateUniqueEmailInterface
{
    public function validatePost($post): bool
    {
        return empty($post);
    }

    public function validatePassword($password, $passwordConfirmation): bool
    {
        return !($password == $passwordConfirmation);
    }

    public function validateEmail($email): bool
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function validateUniqueEmail($users, $email): bool
    {
        $notUnique = false;
        foreach ($users as $user) {
            if ($user['email'] == $email) {
                $notUnique = true;
            }
        }
        return $notUnique;
    }
}