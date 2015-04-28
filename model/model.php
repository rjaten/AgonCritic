<?php

	function getDBConnection() {
		$dsn = 'mysql:host=localhost;dbname=s_rjaten_agoncritic';
		$username = 's_rjaten';
		$password = 'DestinyRulez69';

		try {
			$db = new PDO($dsn, $username, $password);
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorMessage.php';
			die;
		}
		return $db;
	}
        
        function getByGeneralSearch($criteria) {
		try {
			$db = getDBConnection();
			$query = "SELECT *
					FROM games
					WHERE Name LIKE :criteria OR 
					Console LIKE :criteria OR
					Publisher LIKE :criteria OR
                                        Developer LIKE :criteria";
			$statement = $db->prepare($query);
			$statement->bindValue(':criteria', "%$criteria%");
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;           // Assoc Array of Rows
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorMessage.php';
			die;
		}		
	}
        
        function getConsole($console) {
		try {
			$db = getDBConnection();
			$query = "SELECT * FROM games WHERE Console LIKE :console order by Name";
			$statement = $db->prepare($query);
                        $statement->bindValue(':console', "%$console%");
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;           // Assoc Array of Rows
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}		
	}
        
        function getGame($gameID) {
		try {
			$db = getDBConnection();
			$query = "SELECT * FROM games
				  WHERE Game_ID = :gameID ";
			$statement = $db->prepare($query);
			$statement->bindValue(':gameID', $gameID);
			$statement->execute();
			$result = $statement->fetch();  // Should be 0 or 1 row
			$statement->closeCursor();
			return $result;			 // False if 0 rows
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorMessage.php';
			die;
		}
	}
        
        function getGames() {
		try {
			$db = getDBConnection();
			$query = "SELECT * FROM games";
			$statement = $db->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;           // Assoc Array of Rows
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorMessage.php';
			die;
		}		
	}
        
        function getGenre($genre) {
		try {
			$db = getDBConnection();
			$query = "SELECT * FROM games WHERE Genre LIKE :genre order by Name";
			$statement = $db->prepare($query);
                         $statement->bindValue(':genre', "%$genre%");
			$statement->execute();
			$results = $statement->fetchAll();
			$statement->closeCursor();
			return $results;           // Assoc Array of Rows
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
			include '../view/errorPage.php';
			die;
		}		
	}
        
        function getCurrImages() {
            
        }
        
        function insertGame($name, $genre, $publisher, $developer, $console, $releasedate, $isNew, $rating, $picture) {
		$db = getDBConnection();
		$query = "INSERT INTO games (Name, Genre, Publisher, Developer, Console, ReleaseDate, isNew, Rating, Picture)
			VALUES (:Name, :Genre, :Publisher, :Developer, :Console, :ReleaseDate, :isNew, :Rating, :Picture)";
		$statement = $db->prepare($query);
		$statement->bindValue(':Name', $name);
		$statement->bindValue(':Genre', $genre);
		$statement->bindValue(':Publisher', $publisher);
		$statement->bindValue(':Developer', $developer);
		$statement->bindValue(':Console', $console);
                $statement->bindValue(':ReleaseDate', toMySQLDate($releasedate));
		$statement->bindValue(':isNew', $isNew);
                $statement->bindValue(':Rating', $rating);
                $statement->bindValue(':Picture', $picture);		
		$success = $statement->execute();
		$statement->closeCursor();

		if ($success) {
			return $db->lastInsertId();
		} else {
			logSQLError($statement->errorInfo());
		}		
	}
	
	function updateGame($gameID, $name, $genre, $publisher, $developer, $console, $releasedate, $isNew, $rating, $picture) {
		$db = getDBConnection();
		$query = 'UPDATE games SET Name = :Name, Genre = :Genre, 
					Publisher = :Publisher, Developer = :Developer, Console = :Console,
					ReleaseDate = :ReleaseDate, isNew = :isNew, Rating = :Rating,
                                        Picture = :Picture
				  WHERE GameID = :GameID';
		$statement = $db->prepare($query);
		$statement->bindValue(':GameID', $gameID);
		$statement->bindValue(':Name', $name);
		$statement->bindValue(':Genre', $genre);
		$statement->bindValue(':Publisher', $publisher);
		$statement->bindValue(':Developer', $developer);
		$statement->bindValue(':Console', $console);
		$statement->bindValue(':ReleaseDate', toMySQLDate($releasedate));
                $statement->bindValue(':isNew', $isNew);
                $statement->bindValue(':Rating', $rating);
                $statement->bindValue(':Picture', $picture);
                
		$success = $statement->execute();
		$statement->closeCursor();

		if ($success) {
			return $statement->rowCount();         // Number of rows affected
		} else {
			logSQLError($statement->errorInfo());  // Log error to debug
		}		
	}
	
	function deleteAGame($gameID){
		$db = getDBConnection();

		$query = 'DELETE FROM games
					 WHERE GameID = :GameID';

		$statement = $db->prepare($query);
		$statement->bindValue(':GameID', $gameID);

		$success = $statement->execute();
		$statement->closeCursor();

		if ($success) {
			return $statement->rowCount(); // Number of rows affected
		} else {
			logSQLError($statement->errorInfo());  // Log error 
		}		
	}
        
        function logSQLError($errorInfo) {
		$errorMessage = $errorInfo[2];
		include '../view/errorMessage.php';
	}
        
        function saveEmailRecipient($firstName, $email)
        {
            $file = fopen('../DataFiles/subscribers.csv', 'a+b');
            fputcsv($file, array($firstName, $email));
            fclose($file);
        }

?>

