<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $pass = trim($_POST['password']);
    
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В имене допускается использовать только символы латинского алфавита и пробел";
    }
    
    if (empty($pass)) {
        $errors[] = 'Пароль обязателен';
    } elseif (strlen($pass) <= 4) {
        $errors[] = 'Пароль должен быть длиннее 4-ёх символов';
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $pass = htmlspecialchars($pass);
        
        print('<h1>Данные обработаны</h1>');
        print("Имя: {$name}<br>");
        print("Пароль: {$pass}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}