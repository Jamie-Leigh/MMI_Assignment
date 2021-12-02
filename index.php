<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once(__DIR__.'/includes/autoloader.php');
require_once(__DIR__.'/includes/database.php');
if($_SESSION['user_data']) {
    $User = new User($Conn);
    $user_data = $User->getUser();
    $_SESSION['user_data'] = $user_data;
} else {
    $isVisitor = true;
}
ini_set('display_errors', 'On');
$page = $_GET['p'];
$isUser = ($_SESSION['user_data']['user_type'] == 'USER');
$isAdmin = ($_SESSION['user_data']['user_type'] == 'ADMIN');
$isSuper = ($_SESSION['user_data']['user_type'] == 'SUPER');

$visitor_notallowed = ['caradmin', 'useradmin', 'basket', 'account'];
$user_notallowed = ['caradmin', 'useradmin'];
$admin_notallowed = ['caradmin'];

if(!$page){
    $page = "home";
}


if($isVisitor) {
    if(in_array($page, $visitor_notallowed)) {
        echo "not allowed";
        exit();
    }
}else if($isUser) {
    if(in_array($page, $user_notallowed)) {
        echo "not allowed";
        exit();
    }
}else if($isAdmin) {
    if(in_array($page, $admin_notallowed)) {
        echo "not allowed";
        exit();
    }
}

//n assume allowed
require_once(__DIR__.'/includes/header.php');
require_once(__DIR__.'/pages/'.$page.'.php');
require_once(__DIR__.'/includes/footer.php');
