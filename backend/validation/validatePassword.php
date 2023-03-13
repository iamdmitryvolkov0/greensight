<?php

/**
 * @param $password
 * @param $passwordConfirmation
 * @return bool
 */
function validatePassword($password, $passwordConfirmation): bool
{
    return $password == $passwordConfirmation;
}