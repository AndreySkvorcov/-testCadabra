<?php

function index()
{
    if (empty($_SESSION['login'])) {
        view('pages/page2error');
    } else {
        view('pages/page2');
    }
}