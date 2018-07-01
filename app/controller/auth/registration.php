<?php

if ($_POST) {
    require_once MODELS . '/users.php';

    $login    = $_POST['login'];
    $pass     = $_POST['password'];
    $resLogin = getUserByLogin($login);

    if (validField($login, $pass)) {
        if (createUser($login, crypt($pass, require_once __DIR__ . '/../../../core/lib/getSalt.php'))) {
            header("Location: /");
        } else {
            echo 'Не создали';
        }
    } else {
        echo 'Данные не валидны';
    }
}

view('/auth/registration');

function validField($login, $pass)
{
    if (mb_strlen($login) >= 4 && mb_strlen($pass) >= 4) {
        $regExp = "/[A-ZА-Я0-9]+/iu";
        if (preg_match($regExp, $login) && preg_match($regExp, $pass)) {
            return true;
        }
    }

    return false;
}
