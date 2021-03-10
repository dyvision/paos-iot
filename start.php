<?php

use paos_iot\settings;

include('lib/paos-iot.php');
?>

<head>
    <link href='style/style.css' rel='stylesheet'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
    <center>
        <div class='card'>
            <img width='100%' height='auto' src='style/paos.png'>
            <div class='card-body'>
                <h1>Welcome to PAOS</h1>
                <?php
                $opcli = new settings();
                if (json_decode($opcli->get(), true)['wifi'] == true) {
                ?>
                    <span>Launch a Parsec session using your phone.</span>
                    <span>Scan the barcode above or navigate to https://api.paos.io to access the dashboard</span></br></br>
                    <center>
                        <img width='25%' src='style/qr-code.png'>
                    </center>
                <?php
                } else {
                ?>
                    <span>Configure your PAOS Device using your phone.</span>
                    <span>Scan the barcode above or navigate to https://api.paos.io to access the dashboard</span></br></br>
                    <center>
                        <img width='25%' src='style/qr-code.png'>
                    </center>
                <?php
                }

                ?>
            </div>
    </center>
</body>