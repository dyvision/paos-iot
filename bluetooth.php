<head>
    <link href='style/style.css' rel='stylesheet'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
    <center>
        <div class='exit'><a href='home.php'>X</a></div>
        <div class='card'>
            <img width='100%' height='auto' src='style/connection.png'>
            <div style='overflow-y:scroll;height:100%'class='card-body'>
                <h1>Connect your bluetooth controller</h1>
                <h2>Current Devices:</h2>
                <?php
                include('lib/paos-iot.php');

                use paos_iot\blue;

                $blue = new blue();
                $current = json_decode($blue->current(), true);
                foreach ($current as $device) {
                    echo "<span>".$device['name']."<a style='color:red' href='api/blue.php?mac=".$device['mac']."'> X</a></span>";
                }
                ?>

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