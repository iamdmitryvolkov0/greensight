<?php

namespace Logs;

class FileLogger
{
    public function write(array $errors): void
    {
        $log_file = fopen("log.txt", "a");
        $log_message = date("Y-m-d H:i:s")
            . " - Пользователь " . $_POST['firstName'] . " " . $_POST['lastName']
            . " пытается зарегистрироваться с email " . $_POST['email']
            . "\n" . "Проверка на ошибки:" . "\n"
            . ($errors['unique'] ? "✓ Email свободен" : "× Email уже зарегистрирован") . "\n"
            . ($errors['email'] ? "✓ Email введен правильно" : "× Email введен некорректно") . "\n"
            . ($errors['password'] ? "✓ Пароли совпадают" : "× Пароли не совпадают") . "\n"
            . "---------------------------------------------------------------" . "\n";
        fwrite($log_file, $log_message);
        fclose($log_file);
    }
}