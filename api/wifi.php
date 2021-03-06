<?php
include('/var/www/html/paos-iot/lib/paos-iot.php');

use paos_iot\wifi;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = json_decode(file_get_contents('php://input'), true);
    if ($post == null) {
        $post = $_POST;
        $wifi = new wifi();
        if ($wifi->connect($post['ssid'], base64_encode($post['password'])) == 'success') {
            $wifi->save($post['ssid'], base64_encode($post['password']));
            header('location ../wifi.php');
        } else {
            header('location ../wifi.php?error=1');
        }
    } else {
        $wifi = new wifi();
        if ($wifi->connect($post['ssid'], base64_encode($post['password'])) == 'success') {
            $wifi->save($post['ssid'], base64_encode($post['password']));
            $response['message'] = 'connected';
        } else {
            $response['message'] = 'could not connect';
        }
        print_r(json_encode($response));
    }
}
