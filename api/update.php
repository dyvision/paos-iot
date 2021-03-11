<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
include('/var/www/html/paos-iot/lib/paos-iot.php');

use paos_iot\parsec;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $post = json_decode(file_get_contents('php://input'), true);
    if ($post == null) {
        $post = $_POST;
        $parsec = new parsec();
        if (json_decode($parsec->update())) {
            header('location: ../home.php');
        } else {
            header('location: ../home.php');
        }
    } else {
    }
}
