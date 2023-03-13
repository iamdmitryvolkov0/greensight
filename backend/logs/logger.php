<?php

/**
 * @param array $errors
 * @return void
 */
function makeLog(array $errors): void
{
    $log_file = fopen("log.txt", "a");
    $log_message = date("Y-m-d H:i:s")
        . " - Пользователь " . $_POST['firstName'] . " " . $_POST['lastName']
        . " пытается зарегистрироваться с email " . $_POST['email']
        . "\n" . "Проверка на ошибки:" . "\n"
        . ($errors['global'] ? "Данные не отправлены" : "Данные отправлены") . "\n"
        . ($errors['unique'] ? "Email уже зарегистрирован" : "Email свободен") . "\n"
        . ($errors['email'] ? "Email введен некорректно" : "Email введен правильно") . "\n"
        . ($errors['password'] ? "Пароли не совпадают" : "Пароли совпадают") . "\n"
        . "---------------------------------------------------------------" . "\n";
    fwrite($log_file, $log_message);
    fclose($log_file);
}
