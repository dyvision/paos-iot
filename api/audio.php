<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('/var/www/html/paos-iot/lib/paos-iot.php');

use paos_iot\audio;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $audio = new audio();
    $audio->set_device(urldecode($_GET['device']));
    echo urldecode($_GET['device']);
    header('location: ../audio.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $post = json_decode(file_get_contents('php://input'), true);
    if ($post == null) {
        $post = $_POST;
    }
    $audio = new audio();
    $push = json_decode($audio->set_volume($post['direction']), true);
    if ($push) {
        $response['message'] = 'success';
    } else {
        $response['message'] = 'failure';
    }
    print_r(json_encode($response));
}
