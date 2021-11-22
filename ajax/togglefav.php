<?php
session_start();
require_once(__DIR__.'/../includes/autoloader.php');
require_once(__DIR__.'/../includes/database.php');

if($_SESSION['user_data']) {
    $car_id = (int) $_POST['car_id'];
    if ($car_id) {
        $Favourite = new Favourite($Conn);
        $toggle = $Favourite->toggleFavourite($_POST['car_id']);
        if($toggle) {
            echo json_encode(array(
                "success" => true,
                "reason" => "Car was added to users favourites"
            ));
        } else {
            echo json_encode(array(
                "success" => true,
                "reason" => "Car was removed from users favourites"
            ));
        }
    } else {
        echo json_encode(array(
            "success" => false,
            "reason" => "Car ID not provided"
        ));
    }
} else {
    echo json_encode(array(
        "success" => false,
        "reason" => "User not logged in"
    ));
}