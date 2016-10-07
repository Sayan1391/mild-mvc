<?php
session_start();

$_SESSION['user_id'];
//var_dump(['user_id']);

use system\App;

require_once __DIR__ . '/system/autoload.php';

App::run();