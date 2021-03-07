<head>
    <script src='lib/paos_iot.js'></script>
</head>
<h1>Launch Parsec</h1>
<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
include('lib/paos-iot.php');

use paos_iot\parsec;

$parsec = new parsec();
?>

<form action='api/parsec.php' method='POST'>
    <select name='peer_id'>
        <?php


        $list = json_decode($parsec->get($_COOKIE['id'],$_COOKIE['guid']), true);
        foreach ($list['data'] as $device) {
           echo "<option value='".$device['peer_id']."'>".$device['name']."</option>";
        }


        ?>
    </select>
    <button>Launch</button>
    
</form>
<button onclick='kill_session();'>Kill Session</button>