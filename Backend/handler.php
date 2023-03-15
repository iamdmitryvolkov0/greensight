<?php

//TODO разобраться с autoload
//require_once "Validation/Validator.php";
//require_once "Response.php";
//require_once "Logs/Logger.php";



$errors = array();

$users = [
    [
        'id' => 1,
        'name' => 'Иван',
        'email' => 'iamdmitryvolkov@gmail.com'

    ],
    [
        'id' => 2,
        'name' => 'Петр',
        'email' => 'esperanto@gmail.com'
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
$errors['global'] = $validator->validatePost($_POST); //return true if $_POST is empty
$errors['email'] = $validator->validateEmail($data['email']); //return true if email invalid
$errors['unique'] = $validator->validateUniqueEmail($users, $data['email']); // return true if email not unique
$errors['password'] = $validator->validatePassword($data['password'], $data['passwordConfirmation']); //return true if passwords are different

$log = new Logger();
$log->makeLog($errors);

$response = new Response();
$response->execute($errors);
