<?php
    require_once '../model/model.php';

    if (isset($_POST['action'])) {  // check get and post
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        include('../view/AgonHome.php');  // default action
        exit();
    }

    switch ($action) {
        case 'About':
            include '../view/AgonAbout.php';
            break;
        case 'SendEmails':
            include '../view/sendEmails.php';
            break;
        case 'FileManagement':
            include '../view/Admin.php';
            break;
        case 'Ideas':
            include '../view/AgonIdeas.php';
            break;
        case 'CheckSheet':
            include '../view/CheckSheet.php';
            break;
        case 'Genre':
            include '../view/AgonGenre.html';
            break;
        case 'Signup':
            include '../view/signup.php';
            break;
        case 'ProcessFileUpload': 
            processFileUpload();
            break;
        case 'ProcessImageUpload': 
            processImageUpload();
            break;
        case 'ProcessQuoteUpload': 
            processQuoteUpload();
            break;
        case 'ProcessSignups':
            processSignups();
            break;
        case 'Construction': 
            include '../view/Construction.html';
            break;
        default:
            include('../view/AgonHome.php');   // default
    }
	
    function processFileUpload()
    {
        $directory = "../uploads/";
        
        $file = $directory . basename($_FILES["userfile"]["name"]);
        $destination = $directory . "Newsletter.html";
        $isOkay = 1;
        $imageFileType = pathinfo($file,PATHINFO_EXTENSION);

        if($imageFileType != "html") {
            $whyMsg = "Sorry, only HTML files are allowed. <br>";
            $isOkay = 0;
        }
        
        if($isOkay === 0)
        {   
            $msg = "Upload was unsuccessful.";
        }
        else
        {
            if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $destination)) {
                $msg = "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded. <br>";
                $whyMsg = "No problems whatsoever! Congrats, you could upload a file. Wow.";
            } else {
                $msg = "Sorry, there was an error uploading your file. Try again. <br>";
            }
        }
            
        include '../view/processFileUpload.php';
    }
    
    function processImageUpload()
    {
        $directory = "../uploads/";
        
        $file = $directory . basename($_FILES["userfile"]["name"]);
        $isOkay = 1;
        $imageFileType = pathinfo($file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["userfile"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $whyMsg += "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
            $whyMsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
            $isOkay = 0;
        }
        if($isOkay === 0)
        {   
            $msg = "Upload was unsuccessful.";
        }
        else
        {
            if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $file)) {   
                $dir = '../uploads';
                $dh  = opendir($dir);
                while (false !== ($filename = readdir($dh))) {
                    $ext = substr($filename, strrpos($filename, '.') + 1);
                    if(in_array($ext, array("jpg","jpeg","png","gif"))){
                        $files[] = $filename;
                        $msg = "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded. <br>";
                        $whyMsg = " There were no issues! Congratulations you know how to upload a file.";
                    }
                }
            } else {
                $msg = "Sorry, there was an error uploading your file. Try again. <br>";
            }
        }
        include '../view/processImageUpload.php';
    }
    
    function processQuoteUpload()
    {
       $directory = "../uploads/";
        
        $file = $directory . basename($_FILES["userfile"]["name"]);
        $destination = $directory . "Quote.txt";
        $isOkay = 1;
        $imageFileType = pathinfo($file,PATHINFO_EXTENSION);


        // Allow certain file formats
        if($imageFileType != "txt") {
            $whyMsg = "Sorry, only TXT files are allowed. <br>";
            $isOkay = 0;
        }
        
        // If it isn't okay to upload then display message otherwise 
        // attempt the upload
        if($isOkay === 0)
        {   
            $msg = "Upload was unsuccessful.";
        }
        else
        {
            if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $destination)) {
                $msg = "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded. <br>";
                $whyMsg = "There were absolutely 0 problems yo.";
            } else {
                $msg = "Sorry, there was an error uploading your file. Try again. <br>";
            }
        }
        include '../view/processQuoteUpload.php';
    }
    
    function processSignups()
    {
        $firstName = $_POST['FirstName'];
        $email = $_POST['Email'];
	
        if (empty ($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "You must provide a valid email address to register.";
	} else {
            saveEmailRecipient($firstName, $email);
            $msg = "Thanks for subscribing!";
            
	}
        include '../view/processSignups.php';
    }
?>