<!DOCTYPE html>
<html>
    <head>
        <title>Agon-Critic</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../images/favicon.ico">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/ticker.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/main.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            function initialize() {
                var mapCanvas = document.getElementById('map-canvas');
                var mapOptions = {
                    center: new google.maps.LatLng(41.208392,-79.378937),
                    zoom: 17,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
            var map = new google.maps.Map(mapCanvas, mapOptions);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>
    <body>
            <?php
                include '../view/navcontent.html';
            ?>
         <section class="nav2">
            <div class="ticker">	
                <?php
                    $filename = "../uploads/quote.txt";
                    $lines = file($filename, FILE_IGNORE_NEW_LINES);
                    $quoteRand = rand(0, max(array_keys($lines)));
                    echo "$lines[$quoteRand]";
                ?>
            </div>
            <div class="login">Login | Signup</div>
        </section> 
        <section class="randPic">
            <?php
                $dir = '../uploads';
                $dh  = opendir($dir);
                while (false !== ($filename = readdir($dh))) {
                    $ext = substr($filename, strrpos($filename, '.') + 1);
                    if(in_array($ext, array("jpg","jpeg","png","gif")))
                        $files[] = $filename;
                }
                $rand = rand(0, max(array_keys($files)));
                echo "<img src='../uploads/$files[$rand]' alt='Header' class='randPic'>";
            ?>
        </section>
        <section class="mainDiv">
        
