<?php

interface ValidatePasswordInterface
{
    public function validatePassword($password, $passwordConfirmation): bool;
}