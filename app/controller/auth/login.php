<?php

function index()
{
    if ($_POST) {
        require_once BASE_DIR . '/app/model/users.php';

        if ($user = getUserByName($_POST['login'])) {
            if ($user['password'] == md5($_POST['password'])) {
                if (isset($_POST['rememberme'])) {
                    setcookie(session_name(), session_id(), time() + 60 * 60 * 24 * 30, '/');
                }
                $_SESSION['login'] = $user['login'];
                header("Location: /");
            } else {
                echo 'Неверный пароль';
            }
        } else {
            echo 'Не верный логин';
        }
    }
    view('auth/login');
}
