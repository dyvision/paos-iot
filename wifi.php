<head>
    <title>Parsec Arcade OS | Wifi</title>
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
                <h1>Connect to WiFi</h1>
                <?php
                include('lib/paos-iot.php');

                use paos_iot\wifi;

                $wifi = new wifi();

                $cached = $wifi->get_cache();

                if ($cached != '') {
                    echo "<h3>Saved Connection: $cached </h3>";
                }
                if ($_GET['error'] == 1) {
                    echo '<span>Connection failed, try again</span>';
                }
                ?>

            </div>
            <form action='api/wifi.php' method='POST'>
                <input type='text' id='ssid' name='ssid' placeholder="ssid">
                <!--<select name='ssid'>
        <?php


        #$list = json_decode($wifi->get(), true);
        #foreach ($list as $ssid) {
        #    echo "<option value='$ssid'>$ssid</option>";
        #}


        ?>
    </select>-->
                <input id='password' type='password' name='password' placeholder="password">
                <button type='button' onclick='wifi(document.getElementById("ssid").value,document.getElementById("password").value)'>Connect</button>
            </form>
        </div>
    </center>
</body>