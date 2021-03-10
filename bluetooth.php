<head>
    <link href='style/style.css' rel='stylesheet'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
    <center>
        <div class='exit'><a href='home.php'>X</a></div>
        <div class='card'>
            <img width='100%' height='auto' src='style/connection.png'>
            <div class='card-body'>
                <h1>Connect to blue</h1>
                <?php
                include('lib/paos-iot.php');

                use paos_iot\blue;

                $blue = new blue();

                ?>

            </div>
            <form action='api/blue.php' method='POST'>
                <input type='text' name='ssid' placeholder="ssid">
                <select name='ssid'>
        <?php


        $list = json_decode($blue->get(), true);
        foreach ($list as $device) {
            echo "<option value='$device[0]'>$device[1]</option>";
        }


        ?>
    </select>
                <input type='password' name='password' placeholder="password">
                <?php echo $list; ?>
                <button>Connect</button>
            </form>
        </div>
    </center>
</body>