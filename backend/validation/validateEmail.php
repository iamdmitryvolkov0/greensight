<?php

/**
 * @param $email
 * @return bool
 */
function validateEmail($email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}