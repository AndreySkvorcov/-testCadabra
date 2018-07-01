<?php

function getURL($path)
{
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $path;
}
