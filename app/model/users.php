<?php

function getUser($id)
{
    return query("SELECT * FROM users WHERE id=" . $id);
}

function getUserByName($login)
{
    return query("SELECT * FROM users WHERE login=" . "'$login'");
}

function createUser($login, $password)
{
    return execute("INSERT INTO users (login, password) VALUES ('$login','$password')");
}
