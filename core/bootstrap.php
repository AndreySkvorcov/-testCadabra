<?php
session_start();

define('BASE_DIR', realpath(__DIR__ . '/../'));

require_once realpath(__DIR__ . '/lib/functions.php');
require_once realpath(__DIR__ . '/lib/router.php');
require_once realpath(__DIR__ . '/lib/view.php');
require_once realpath(__DIR__ . '/lib/db.php');

$parts = router();

require_once $parts['controller'];
$parts['method']();
