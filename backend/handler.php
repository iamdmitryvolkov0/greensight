<?php
require_once "response.php";
require_once "validation/validateEmail.php";
require_once "validation/validatePassword.php";
require_once "logs/logger.php";

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

if (!isset($_POST)) {
    $errors['global'] = 'Данные не отправлены';
}
$data = [
    'firstName' => $_POST['firstName'],
    'lastName' => $_POST['lastName'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'passwordConfirmation' => $_POST['passwordConfirmation'],
];

if (!validateEmail($data['email'])) {
    $errors['email'] = true;
}

if (!validatePassword($data['password'], $data['passwordConfirmation'])) {
    $errors['password'] = true;
}

foreach ($users as $user){
    if ($user['email'] == $data['email']){
        $errors['unique'] = true;
    }
}

    makeLog($errors);
response($errors);
