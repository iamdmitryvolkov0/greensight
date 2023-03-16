<?php

namespace Errors;

class ErrorHandler
{
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