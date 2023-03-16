<?php

namespace Validation;

interface ValidateEmailInterface
{
    public function validateEmail($email): bool;
}