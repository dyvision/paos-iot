<h1>Configure Audio</h1>
<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
include('lib/paos-iot.php');

use paos_iot\audio;

$audio = new audio();

$cached = $audio->get_cache();

if ($cached != '') {
    echo "<h3>Default Device: $cached </h3>";
}
?>

<form action='api/audio.php' method='POST'>
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

<?php print_r(json_decode($audio->get_device(),true)) ?>
<h3>Volume</h3>
<button>+</button>
<button>-</button>