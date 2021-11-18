<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once(__DIR__.'/includes/autoloader.php');
require_once(__DIR__.'/includes/database.php');
if($_SESSION['user_data']) {
    $User = new User($Conn);
    $user_data = $User->getUser();
    $_SESSION['user_data'] = $user_data;
}
ini_set('display_errors', 'On');
$page = $_GET['p'];
if(!$page){
    $page = "home";
}
require_once(__DIR__.'/includes/header.php');
require_once(__DIR__.'/pages/'.$page.'.php');
require_once(__DIR__.'/includes/footer.php');
