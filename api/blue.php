<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
include('/var/www/html/paos-iot/lib/paos-iot.php');

use paos_iot\blue;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = json_decode(file_get_contents('php://input'), true);
    if ($post == null) {
        $post = $_POST;
        $blue = new blue();
        if (json_decode($blue->set($post['device']),true)['message'] == 'success') {
            header('location: ../blue.php');
        } else {
            header('location: ../blue.php?error=1');
        }
    } else {
        $blue = new blue();
        if (json_decode($blue->set($post['device']),true)['message'] == 'success') {
            $response['message'] = 'connected';
        } else {
            $response['message'] = 'could not connect';
        }
        print_r(json_encode($response));
    }
}
