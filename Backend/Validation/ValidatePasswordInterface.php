<?php

namespace Validation;

interface ValidatePasswordInterface
{
    public function validatePassword($password, $passwordConfirmation): bool;
}