<?php

function view($path, $data = null)
{
    require_once VIEWS . '/' . $path . '.php';
}
