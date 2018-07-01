<?php

require_once __DIR__ . '/../../core/lib/db.php';

function getUserByLogin($login)
{
    $user = ORM::for_table('task_1_auth')
               ->where('login', $login)
               ->find_array();

    return $user;
}

function createUser($login, $password)
{
    $createUser = ORM::for_table('task_1_auth')->create();
    $createUser->set('login', $login)->set('password', $password)->save();

    if ($id = $createUser->id()) {
        return true;
    } else {
        return false;
    }
}
