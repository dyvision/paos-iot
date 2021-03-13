<!--golive-->

<head>
    <title>Parsec Arcade OS | Home</title>
    <script src='lib/paos_iot.js'></script>
    <link href='style/style.css' rel='stylesheet'>
    <link rel='shortcut icon' type='image/png' href='style/paoslogo.png' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
    <center>
        <div class='card'>
            <img width='100%' height='auto' src='style/paos.png'>
            <div class='card-body'>
                <h1>Welcome to PAOS</h1>
                <a class='menuitem' href='parsec.php'>Launch Parsec</a>
                <a class='menuitem' href='wifi.php'>WiFi</a>
                <a id='blue' class='menuitem' href='bluetooth.php' onclick='document.getElementById("blue").innerHTML = "Bluetooth - Scanning"'>Bluetooth</a>
                <a class='menuitem' href='display.php'>Display</a>
                <a class='menuitem' href='audio.php'>Audio</a>
                <a id='update' onclick='update_sys();' type='button' class='menuitem'>Update</a>
                <a class='menuitem' href='power.php'>Power</a>
            </div>
    </center>
</body>