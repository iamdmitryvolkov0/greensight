<?php

namespace Response;

class Response
{
    public function format(bool $hasErrors): string
    {
        $response = $hasErrors ? $this->error() : $this->success();

        return json_encode($response);
    }

    public function success(): array
    {
        return [
            'status' => 'Success',
            'message' => 'Validation success'
        ];
    }

    public function error(): array
    {
        return [
            'status' => 'Error',
            'message' => 'Enter correct data'
        ];
    }
}