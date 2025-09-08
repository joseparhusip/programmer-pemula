<?php

// Set correct server variables for Laravel
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public/index.php';
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'] ?? '/';

// Change working directory to Laravel root
chdir(__DIR__ . '/..');

// Include Laravel's main entry point
require __DIR__ . '/../public/index.php';