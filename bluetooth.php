<head>
    <link href='style/style.css' rel='stylesheet'>
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
                <h1>Connect your bluetooth controller</h1>
                <div style='overflow-y:scroll;height:200px'>
                    <span>Current Devices:</span>
                    <form action='api/blue.php' method='POST'>
                        <select name='mac'>
                            <?php
                            include('lib/paos-iot.php');

                            use paos_iot\blue;

                            $blue = new blue();
                            $current = json_decode($blue->current(), true);
                            foreach ($current as $device) {
                                echo "<option value='".$device['mac'] ."'>" . $device['name'] . "</option>";
                            }
                            ?>
                        </select>
                        <button>Remove</button>
                    </form>
                </div>
            </div>
            <form action='api/blue.php' method='POST'>
                <select name='device'>
                    <?php


                    $list = json_decode($blue->get(), true);
                    foreach ($list as $device) {
                        echo "<option value='$device[0]'>$device[1]</option>";
                    }


                    ?>
                </select>
                <button>Connect</button>
            </form>
        </div>
    </center>
</body>