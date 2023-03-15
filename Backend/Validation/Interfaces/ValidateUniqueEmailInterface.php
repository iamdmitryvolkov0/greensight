<?php

interface ValidateUniqueEmailInterface
{
    public function validateUniqueEmail($users, $email): bool;
}