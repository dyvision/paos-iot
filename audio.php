<head>
    <title>audio Arcade OS | Audio</title>
    <script src='lib/paos_iot.js'></script>
    <link href='style/style.css' rel='stylesheet'>
    <link rel='shortcut icon' type='image/png' href='style/paoslogo.png' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
    <center>
        <a href='home.php'>
            <div class='exit'>X</div>
        </a>
        <div class='card'>
            <img width='100%' height='auto' src='style/connection.png'>
            <div class='card-body'>
                <h1>Audio Controls</h1>
                <?php
                //ini_set('audio_errors', 1); ini_set('audio_startup_errors', 1); error_reporting(E_ALL); 
                include('lib/paos-iot.php');

                use paos_iot\audio;

                $audio = new audio();
                ?>
            </div>
            <?php


            $list = json_decode($audio->get_device(), true);
            foreach ($list as $name => $value) {
                echo "<a class='menuitem' href='api/audio.php?device=" . $name  . "'>" . $name . "</a>";
            }


            ?>
            <h3>Volume</h3>
            <a class='menuitem' type='button' onclick="set_volume('up');">+</a>
                <a class='menuitem' type='button' onclick="set_volume('down');">-</a>
        </div>
    </center>
</body>