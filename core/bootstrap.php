<?php

session_start();
error_reporting(-1); // добавлять в отчет все ошибки PHP

define('CONTROLLERS', __DIR__ . '/../app/controller');
define('VIEWS', __DIR__ . '/../app/view');
define('MODELS', __DIR__ . '/../app/model');

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/lib/functions.php';
require_once __DIR__ . '/lib/view.php';

$klein = new Klein\Klein();

$klein->respond(function ($request, $response, $service) {
    $service->layout(__DIR__ . '/../app/view/main.php');
});

$klein->respond('/', function ($request, $response, $service) {
    $service->pageTitle = 'Home page';
    $service->render(CONTROLLERS . '/index/index.php');
});

$klein->respond('/auth/registration', function ($request, $response, $service) {
    $service->pageTitle = 'Регистрация';
    $service->render(CONTROLLERS . '/auth/registration.php');
});

$klein->respond('/auth/login', function ($request, $response, $service) {
    $service->pageTitle = 'Вход';
    $service->render(CONTROLLERS . '/auth/login.php');
});

$klein->respond('/auth/logout', function ($request, $response, $service) {
    $service->pageTitle = 'Выход';
    $service->render(CONTROLLERS . '/auth/logout.php');
});

$klein->respond('/pages/page1', function ($request, $response, $service) {
    $service->pageTitle = 'Регистрация';
    $service->render(CONTROLLERS . '/pages/page1.php');
});

$klein->respond('/pages/page2', function ($request, $response, $service) {
    $service->pageTitle = 'Регистрация';
    $service->render(CONTROLLERS . '/pages/page2.php');
});

$klein->dispatch();
