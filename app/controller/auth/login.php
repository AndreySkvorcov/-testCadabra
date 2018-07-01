<?php

if ($_POST) {
    require_once MODELS . '/users.php';

    if ($user = getUserByLogin($_POST['login'])) {
        if ($user[0]['password'] == crypt($_POST['password'], require_once __DIR__ . '/../../../core/lib/getSalt.php')) {
            if (isset($_POST['rememberme'])) {
                setcookie(session_name(), session_id(), time() + 60 * 60 * 24 * 30, '/');
            }
            $_SESSION['login'] = $user[0]['login'];
            header("Location: /");
        } else {
            echo 'Неверный пароль';
        }
    } else {
        echo 'Не верный логин';
    }
}

view('/auth/login');
