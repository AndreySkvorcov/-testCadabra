<?php

try {
    ORM::configure([
        'connection_string' => 'mysql:host=localhost;dbname=task_1',
        'username' => 'mysql',
        'password' => 'mysql'
    ]);
} catch (PDOException $e) {
    $e->getMessage();
}
