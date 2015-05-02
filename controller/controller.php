<?php
    require_once '../model/model.php';
    require_once '../lib/general_fns.php';

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
        case 'AddGame':
            addGame();
            break;
        case 'EditGame':
            editGame();
            break;
        case 'DeleteGame':
            deleteGame();
            break;
        case 'ProcessAddEdit':
            processAddEdit();
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
        case 'ShowGames':
            showGames();
            break;
        case 'ShowGame':
            showGame();
            break;
        default:
            include('../view/AgonHome.php');   // default
    }
    
    function addGame() 
    {
	$mode = "Add";
        $gameID = 0;
	$name = "";
	$genre = "";
	$console = "";
	$developer = "";
	$publisher = "";
        $rating = 0.0;
	$isNew = "1";
	$releasedate = "";
		
	include '../view/editGame.php';
    }
    
    function deleteGame() {
		$gameID = $_GET['GameID'];
		if (!isset($gameID)) {
			$errorMessage = 'You must provide a GameID to delete.';
			include '../view/errorMessage.php';
		} else {
			$rowCount = deleteAGame($gameID);
			if ($rowCount != 1) {
				$errorMessage = "The delete affected $rowCount rows.";
				include '../view/errorMessage.php';
			} else {
				header("Location:../controller/controller.php");
			}
		}
		
	}
    
    function editGame() {
		$gameID = $_GET['GameID'];
		if (!isset($gameID)) {
			$errorMessage = 'You must provide a GameID to display.';
			include '../view/errorMessage.php';
		} else {
			$row = getGame($gameID);
			if ($row == FALSE) {
				$errorMessage = 'That game was not found.';
				include '../view/errorMessage.php';
			} else {
				$mode = "Edit";
				$gameID = $row['GameID'];
				$name = $row['Name'];
				$genre = $row['Genre'];
				$console = $row['Console'];
				$developer = $row['Developer'];
				$publisher = $row['Publisher'];
				$rating = $row['Rating'];
                                $isNew = $row['isNew'];
				$releasedate = $row['ReleaseDate'];
				
				include '../view/editGame.php';
			}
		}		
	}
    
    function processAddEdit() 
    {
	
        $gameID = $_POST['GameID'];
	$mode = $_POST['Mode'];
	$name = $_POST['Name'];
	$genre = $_POST['Genre'];
        $console = $_POST['Console'];
        $developer = $_POST['Developer'];
	$publisher = $_POST['Publisher'];
	$releasedate = $_POST['ReleaseDate'];
	$rating = $_POST['Rating'];
        if(!isset($_POST['Picture'])) {
            $picture = "";
        }
        else {
            $picture = '../images/' . $_POST['Picture'];
        }
	if (isset($_POST['isNew'])) {
            $isNew = 1;
	} else {
            $isNew = 0;
	}
	// Validations
	$errors = "";
        if (!empty($name) && strlen($name) > 50) 
        {
            $errors .= "\\n* Name is required and must be no more than 50 characters.";
        }
        if (!empty($genre) && strlen($genre) > 100) 
        {
            $errors .= "\\n* Genre is required and must be no more than 100 characters.";
        }
        if (!empty($console) && strlen($console) > 100) 
        {
            $errors .= "\\n* Developer is required and must be no more than 100 characters.";
        }
        if (strlen($developer) > 100) 
        {
            $errors .= "\\n* Developer must be no more than 100 characters.";
        }
        if (strlen($publisher) > 100) 
        {
            $errors .= "\\n* Publisher must be no more than 100 characters.";
        }
        
        $imageFileType = pathinfo($picture,PATHINFO_EXTENSION);
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $picture != "")
        {
            $errors .= "\\n* Picture selected must be a jpg, jpeg, png, or gif file";
        }
        
        if (empty($releasedate) || !strtotime($releasedate)) 
        {
            $errors .= "\\n* You must provide a valid release date.";
        }
	if (!ctype_digit($rating) > 10 || $rating > 10 || $rating < 0) 
        {
            $errors .= "\\n* Rating must be a decimal between 0 and 10(inclusive).  Enter 0 if unknown.";
	} else if (empty ($rating)) {
            $rating = 0;
	}	
        if ($errors != "") {
            include '../view/editGame.php';
        } else {
            if ($mode == "Add") {
		$gameID = insertGame($name, $genre, $publisher, $developer, $console, $releasedate, $isNew, $rating, $picture);
            } else {
		$rowsAffected = updateGame($gameID, $name, $genre, $publisher, $developer, $console, $releasedate, $isNew, $rating, $picture);
            }
            header("Location:../controller/controller.php?action=ShowGame&GameID=$gameID");
            
	}
		
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
    
    	function searchGames() 
        {
            $results = getAllBeers();
            if (count($results) == 0) {
		$errorMessage = "No beers found.";
		include '../view/errorPage.php';
            } else {
		include '../view/searchBeers.php';
            }		
	}
    
    function showGame()
    {
        $gameID = $_GET['GameID'];
	if (!isset($gameID)) {
            $errorMessage = 'You must provide a game to display.';
            include '../view/errorMessage.php';
	} else {
            $row = getGame($gameID);
            if ($row == FALSE) {
                $errorMessage = 'That game was not found.';
		include '../view/errorMessage.php';
            } else {
                include '../view/showGame.php';
            }
	}
    }
    
    function showGames() 
    {
        if(isset($_GET['ListType'])){
            $listType = $_GET['ListType'];
        } else {
            $listType = 'ShowAll';
        }
        if(isset($_GET['Console'])){
            $console = $_GET['Console'];
        } else {
            $console = '';
        }
        if(isset($_GET['Genre'])){
            $genre = $_GET['Genre'];
        } else {
            $genre = '';
        }
	if ($listType == 'Console') {
            $results = getConsole($console);
	} else if ($listType == 'Genre') {
            $results = getGenre($genre);
	} else if ($listType == 'GeneralSearch') {
            $results = getByGeneralSearch($_GET['Criteria']);
	} else {
            $results = getGames();
	}
	if (count($results) == 0) {
            $errorMessage = "No games found.";
            include '../view/errorMessage.php';
	} else if (count($results) == 1) {
            $row = $results[0];
            include '../view/showGame.php';
	} else {
            include '../view/showGames.php';
	}
    }
?>