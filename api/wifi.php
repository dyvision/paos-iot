<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
include('/var/www/html/paos-iot/lib/paos-iot.php');

use paos_iot\wifi;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = json_decode(file_get_contents('php://input'), true);
    if ($post == null) {
        $post = $_POST;
        $wifi = new wifi();
        if (json_decode($wifi->connect($post['ssid'], $post['password']),true)['message'] == 'success') {
            $wifi->save($post['ssid'], $post['password']);
            header('location: ../wifi.php');
        } else {
            header('location: ../wifi.php?error=1');
        }
    } else {
        $wifi = new wifi();
        if (json_decode($wifi->connect($post['ssid'], $post['password']),true)['message'] == 'success') {
            $wifi->save($post['ssid'],$post['password']);
            $response['message'] = 'connected';
        } else {
            $response['message'] = 'could not connect';
        }
        print_r(json_encode($response));
    }
}
