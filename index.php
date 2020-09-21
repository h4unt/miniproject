<?php
session_start();
ob_start();
ini_set('error_reporting', E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require ('app.php');
spl_autoload_register(function ($class) {
    if(file_exists('model/' . $class . '.php')) include 'model/' . $class . '.php';
    if(file_exists('controller/' . $class . '.php')) include 'controller/' . $class . '.php';
});
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'user';
$method = isset($_GET['act']) ? $_GET['act'] : 'index';
$app = new $ctrl();
$app->$method();
