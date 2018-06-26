<?php

function connect() //создаем подключение к БД
{
    $config = require BASE_DIR . '/config.php';

    $link = new PDO('mysql:host=' . $config['hostname'] . ';dbname=' . $config['database'], $config['username'], $config['password']);

    return $link;
}

function execute($sql) // принимаем на вход sql запрос на создание пользователя в БД
{
    $pdo = connect();
    $pdo->exec($sql);

    return $pdo->lastInsertId();
}

function query($sql)
{
    try {
        $pdo  = connect();
        $stmt = $pdo->query($sql);
        if ($stmt != false) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);

            return $results;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
