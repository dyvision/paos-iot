<head>
    <title>Parsec Arcade OS | Power</title>
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
                <h1>Power Options</h1>
                <a id='reboot' type='button' class='menuitem' onclick="power('reboot');">Reboot</a>
                <buatton id='poweroff' type='button' class='menuitem' onclick="power('poweroff');">Shutdown</a>
            </div>
        </div>
    </center>
</body>