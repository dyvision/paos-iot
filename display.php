<head>
    <title>display Arcade OS | Display</title>
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
                <h1>Adjust Your Resolution</h1>
                <?php
                //ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
                include('lib/paos-iot.php');

                use paos_iot\display;

                $display = new display();
                ?>
            </div>
                    <?php


                    $list = json_decode($display->get_resolution(), true);
                    foreach ($list as $name => $value) {
                        echo "<a class='menuitem' href='api/display?resolution=" .$value  . "'>" . $name.':'. $value . "</a>";
                    }


                    ?>
        </div>
    </center>
</body>