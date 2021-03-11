<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('/var/www/html/paos-iot/lib/paos-iot.php');

use paos_iot\display;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $display = new display();
    if ($display->set_resolution($_GET['resolution'])) {
        header('location: ../display.php');
    } else {
        header('location: ../display.php');
    }
    print_r(json_encode($response));
}
