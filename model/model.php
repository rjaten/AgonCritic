<?php

	function saveMemberInfo($firstName, $lastName, $age, $email) {
		$file = fopen('../DataFiles/members.csv', 'ab');
		fputcsv($file, 
			array($firstName, $lastName, $age, $email));
		fclose($file);		
	}

	function getMembers() {
		$file = fopen('../DataFiles/members.csv', 'rb');
			while (($data = fgetcsv($file)) !== FALSE) {
				$memberArray[] = array($data[0], $data[1], $data[2], $data[3]);
			}
		fclose($file);		
		return $memberArray;
	}
        
        function getCurrImages() {
            
        }
        
        function saveEmailRecipient($firstName, $email)
        {
            $file = fopen('../DataFiles/subscribers.csv', 'a+b');
            fputcsv($file, array($firstName, $email));
            fclose($file);
        }

?>

