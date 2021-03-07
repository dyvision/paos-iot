<h1>Configure Audio</h1>
<?php
include('lib/paos-iot.php');

use paos_iot\audio;

$audio = new audio();

$cached = $audio->get_cache();

if ($cached != '') {
    echo "<h3>Default Device: $cached </h3>";
}
?>

<form action='api/audio.php' method='POST'>
    <input type='text' name='ssid'>
    <select name='device'>
        <?php


        $list = json_decode($audio->get_device(), true);
        foreach ($list['available_devices'] as $device) {
           echo "<option value='$device'>$device</option>";
        }


        ?>
    </select>
    <button>Change Device</button>
</form>

<h3>Volume</h3>
<button>+</button>
<button>-</button>