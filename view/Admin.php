<?php
    require '../view/headercontent.php';
?>
<section class="">
    <form enctype="multipart/form-data" action="../controller/controller.php?action=ProcessFileUpload" method="post">
        Upload a new Newsletter: 
        <input type="file" name="userfile"> <br>
        <input type="submit" value="Upload Newsletter"/>
    </form>
    <br><br>
    <form enctype="multipart/form-data" action="../controller/controller.php?action=ProcessImageUpload" method="post">
        Upload a new Banner Image: 
        <input type="file" name="userfile">  <br>
        <input type="submit" value="Upload Image"/>      
    </form>
    <br><br>
    <form enctype="multipart/form-data" action="../controller/controller.php?action=ProcessQuoteUpload" method="post">
        Upload a new Quote File: 
        <input type="file" name="userfile">  <br>
        <input type="submit" value="Upload Quotes"/>      
    </form>
    <br>
    <a href="../uploads/quote.txt">Quote File</a>
    <br><br>
    <?php
        $dir = "../uploads/";
        $files = scandir($dir);
        print "<pre>";
        print_r($files);
        print "</pre>";
    ?>
</section>
<?php
    require '../view/footercontent.php';
?>