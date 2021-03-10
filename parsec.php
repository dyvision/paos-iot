<head>
    <script src='lib/paos_iot.js'></script>
    <link href='style/style.css' rel='stylesheet'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
    <center>
        <div class='exit'><a href='main.php'>X</a></div>
        <div class='card'>
            <img width='100%' height='auto' src='https://parsec.app/static/opengraph-1a87b526f2a0a7c39d89fd5f3444b947.png'>
            <div class='card-body'>
                <h1>Launch Parsec</h1>
                <?php
                //ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
                include('lib/paos-iot.php');

                use paos_iot\parsec;

                $parsec = new parsec();
                ?>
            </div>
            <form action='api/parsec.php' method='POST'>
                <select name='peer_id'>
                    <?php


                    $list = json_decode($parsec->get($_COOKIE['id'], $_COOKIE['guid']), true);
                    foreach ($list['data'] as $device) {
                        echo "<option value='" . $device['peer_id'] . "'>" . $device['name'] . "</option>";
                    }


                    ?>
                </select></br>
                <button>Launch</button>

            </form>
            <button onclick='kill_session();'>Kill Session</button>
        </div>
    </center>
</body>