<?php

use Logs\FileLogger;
use Response\Response;
use Validation\Validator;

require_once 'autoload.php';

$errors = [];

$users = [
    [
        'id' => 1,
        'name' => 'Иван',
        'email' => 'iamdmitryvolkov@gmail.com'

    ],
    [
        'id' => 2,
        'name' => 'Петр',
        'email' => ''
    ],
    [
        'id' => 3,
        'name' => 'Мария',
        'email' => 'maria@example.com'
    ]
];

$data = [
    'firstName' => $_POST['firstName'],
    'lastName' => $_POST['lastName'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'passwordConfirmation' => $_POST['passwordConfirmation'],
];

$validator = new Validator();
$errors['email'] = $validator->isEmail($data['email']);
$errors['unique'] = $validator->isEmailUnique($users, $data['email']);
$errors['password'] = $validator->isPasswordsEqual($data['password'], $data['passwordConfirmation']);

$hasErrors = $validator->hasErrors($errors);

$response = new Response();
echo $response->format($hasErrors);

$log = new FileLogger();
$log->write($errors);

