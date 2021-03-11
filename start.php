<?php

use paos_iot\settings;

include('lib/paos-iot.php');
?>

<head>
    <link href='style/style.css' rel='stylesheet'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Helvetica">
</head>

<body>
    <center>
        <div class='card'>
            <img width='100%' height='auto' src='style/paos.png'>
            <div class='card-body'>
                <h1 style='font-size: 2vw;'>Welcome to PAOS</h1>
                <?php
                $opcli = new settings();
                if (json_decode($opcli->get(), true)['wifi'] == true) {
                ?>
                    <span style='font-size: 1vw;'>Launch a Parsec session using your phone.</span>
                    <span style='font-size:1vw;'>Scan the barcode below or navigate to https://api.paos.io to access the dashboard</span>
                    <center>
                        <img style='margin:8px' width='25%' src='style/qr-code.png'>
                    </center>
                    <span style='font-size:1vw;color:grey'><?php echo 'Version: '.json_decode(file_get_contents('version/version.json'),true)['version']; ?></span></br></br>
                    
                <?php
                } else {
                ?>
                    <span style='font-size: 1vw;'>Configure your PAOS Device using your phone.</span>
                    <span style='font-size:1vw;'>Scan the barcode below or navigate to https://api.paos.io to access the dashboard</span>
                    <center>
                        <img style='margin:8px' width='25%' src='style/qr-code.png'>
                    </center>
                    <span style='font-size:1vw;color:grey'><?php echo 'Version: '.json_decode(file_get_contents('version/version.json'),true)['version']; ?></span></br></br>
                    
                <?php
                }

                ?>
            </div>
    </center>
</body>