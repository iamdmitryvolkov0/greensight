<?php

namespace Validation;

interface ValidateUniqueEmailInterface
{
    public function validateUniqueEmail($users, $email): bool;
}