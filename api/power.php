<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
include('/var/www/html/paos-iot/lib/paos-iot.php');

use paos_iot\power;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['option'] == 'poweroff') {
        $power = new power();
        $power->power_off();
        header('location: power.php');
    } else {
        $power = new power();
        $power->reboot();
        header('location: power.php');
    }
}
