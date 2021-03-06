<?php
$config = json_decode(file_get_contents('config.json'), true);
if (!isset($_COOKIE['id']) or !isset($_COOKIE['guid'])) {
    header('location: https://api.paos.io/authorize');
} else{
    if ($config['wifi'] == null) {
        header('location: wifi.php');
    } else {
        header('location: home.php');
    }
}
