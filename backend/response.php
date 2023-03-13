<?php

/**
 * @param array $errors
 * @return void
 */
function response(array $errors): void
{
    if (empty($errors)) {
        echo json_encode(array("status" => "success", "message" => "Validation success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Enter correct data"));
    }
}
