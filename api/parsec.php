<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('/var/www/html/paos-iot/lib/paos-iot.php');

use paos_iot\parsec;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = json_decode(file_get_contents('php://input'), true);
    if ($post == null) {
        $post = $_POST;
        $parsec = new parsec();
        $final = print_r($parsec->launch($_COOKIE['session_id'], $post['peer_id']));
        if ($final) {
            #header('location: ../parsec.php');
        } else {
            #header('location: ../parsec.php?error=1');
        }
    } else {
        $parsec = new parsec();
        if (json_decode($parsec->launch($post['session_id'], $post['peer_id']), true)) {
            $response['message'] = 'connected';
        } else {
            $response['message'] = 'could not connect';
        }
        print_r(json_encode($response));
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "DELETE"){
    $parsec = new parsec();
    $parsec->kill_session();
}
