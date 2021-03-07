<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
include('/var/www/html/paos-iot/lib/paos-iot.php');

use paos_iot\audio;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = json_decode(file_get_contents('php://input'), true);
    if ($post == null) {
        $post = $_POST;
        $audio = new audio();
        if (json_decode($audio->set_device($post['device']),true)) {
            #$audio->save($post['device']);
            header('location: ../audio.php');
        } else {
            header('location: ../audio.php?error=1');
        }
    } else {
        $audio = new audio();
        if (json_decode($audio->set_device($post['device']),true)) {
            #$audio->save($post['device']);
            $response['message'] = 'device changed to '.$post['device'];
        } else {
            $response['message'] = 'could not connect';
        }
        print_r(json_encode($response));
    }
} elseif($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $audio = new audio();
        if (json_decode($audio->set_volume($post['direction'],$post['value']),true)) {
            $response['message'] = 'success';
        } else {
            $response['message'] = 'failure';
        }
        print_r(json_encode($response));
}
