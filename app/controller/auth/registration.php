<?php

function index()
{
    if ($_POST) {
        require_once BASE_DIR . '/app/model/users.php';

        $login    = $_POST['login'];
        $pass     = $_POST['password'];
        $resLogin = getUserByName($login);

        if (empty($resLogin['login']) && validField($login, $pass)) {
            $pass = md5($pass);
            if (createUser($login, $pass)) {
                header("Location: /");
            } else {
                echo 'Не создали';
            }
        } else {
            echo 'Данные не валидны';
        }
    }

    view('auth/registration');

}

function validField($login, $pass)
{
    if (mb_strlen($login) && mb_strlen($pass) >= 4) {
        $regExp = "/[A-ZА-Я0-9]+/iu";
        if (preg_match($regExp, $login) && preg_match($regExp, $pass)) {
            return true;
        }
    }
}