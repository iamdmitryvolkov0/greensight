<?php

class Response
{
    public function execute(array $errors): void
    {
        if (empty($errors)) {
            echo json_encode(array("status" => "success", "message" => "Validation success"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Enter correct data"));
        }
    }
}