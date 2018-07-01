<?php

$user = $_SESSION['login'];
setcookie('testcookie', md5($user), time() - 3600, '/');
unset($login);
session_unset();
session_destroy();
header("Location: /");

