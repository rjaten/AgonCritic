<?php
    require 'headercontent.php';
?>
<section class="cen mA">
    <?php
        echo "<br> $msg <br> $whyMsg <br><br>";  
        echo "Current Images: <br>";
                print_r($files);    
    ?>
</section>
<?php
    require 'footercontent.php';
?>
