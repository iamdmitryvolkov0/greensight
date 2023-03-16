<?php

namespace Validation;

interface ValidatePostInterface
{
    public function validatePost(array $post): bool;
}