<?php
include('lib/paos-iot.php');

use paos_iot\user;

if(!isset($_GET['id'])){
    header('location: https://api.paos.io/login');
} else {
    $user = new user();
    $user->login($_GET['id'],$_GET['guid'],$_GET['session_id'],$_GET['user_id']);
    header('location: index.php');
}