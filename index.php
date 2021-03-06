<?php
$config = json_decode(file_get_contents('config.json'), true);
if (!isset($_COOKIE['id']) or !isset($_COOKIE['guid']) or !isset($_COOKIE['session_id'])) {
    header('location: https://api.paos.io/authorize');
} else{
    if ($config['wifi'] == null) {
        header('location: wifi.php');
    } else {
        header('location: home.php');
    }
}
