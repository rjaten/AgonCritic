        </section>
        <footer class="footer">
            <a href="../controller/controller.php">Home</a> - <a href="../controller/controller.php?action=About">About</a> - <a href="mailto:rjaten1993@gmail.com?subject=Comment" target="_top">Comments</a> - <a href="../controller/controller.php?action=Signup"><img src="../images/newsletter.png" alt="Newsletter"/></a><br>
            <?php
                # Found information in PHP Manual and StackOverflow. Got idea from Josh.
                $filenames = Array("AgonHome.php", "AgonAbout.php", "AgonIdeas.php", "Admin.php", "AgonGenre.html", "processFileUpload.php", "processSignups.php", "sendEmails.php", "signup.php", "underconstruction.php");
                $filename = "";
                
                foreach($filenames as $filename )
                {
                    if(basename($_SERVER['PHP_SELF']) === $filename)
                    {
                        break;
                    }
                }
                if (file_exists($filename)) {
                    echo "$filename was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
                }
            ?>
        </footer>
    </body>
</html>

