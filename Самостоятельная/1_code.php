<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $pass = trim($_POST['password']);
    $confPass = trim($_POST['passwordd']);
    
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В имене допускается использовать только символы латинского алфавита и пробел";
    }
    
    if (empty($pass)) {
        $errors[] = 'Пароль обязателен';
    }

    if (empty($confPass)) {
        $errors[] = 'Пароль обязателен';
    } elseif ($confPass != $pass) {
        $errors[] = "Пароли не совпадают";
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $pass = htmlspecialchars($pass);
        $confPass = htmlspecialchars($pass);
        
        print('<h1>Данные обработаны</h1>');
        print("Имя: {$name}<br>");
        print("Пароль: {$pass}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}