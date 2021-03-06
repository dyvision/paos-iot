<h1>Connect to WiFi</h1>
<?php
include('lib/paos-iot.php');

use paos_iot\wifi;

$wifi = new wifi();

$cached = $wifi->get_cache();

if ($cached != '') {
    echo "<h3>Saved Connection: $cached </h3>";
}
?>
<form action='api/wifi.php' method='POST'>
    <select name='ssid'>
        <?php


        $list = json_decode($wifi->get(), true);
        foreach ($list as $ssid) {
            echo "<option value='$ssid'>$ssid</option>";
        }


        ?>
    </select>
    <input type='password' name='password'>
    <button>Connect</button>
</form>