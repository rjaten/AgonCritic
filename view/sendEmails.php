<?php
	require_once 'Mail.php';
	$title = "Send Emails";
	require '../view/headercontent.php';
?>
<h1>Sending Emails</h1>

<?php

	$options = array();
	$options['host'] = 'ssl://smtp.gmail.com';
	$options['port'] = 465;
	$options['auth'] = true;
	$options['username'] = 'rjatencis370@gmail.com';
	$options['password'] = 'CIS370rjaten';
	$mailer = Mail::factory('smtp', $options);

	$headers = array ();
	$headers['From'] = 'RJ Aten <rjatencis370@gmail.com>';
	$headers['Subject'] = 'Agon-Critic Newsletter';
	$headers['Content-type'] = 'text/html';

        $message = file_get_contents("../uploads/Newsletter.html");
	$recipients = array('rjatencis370@gmail.com');
	
    echo "<h3>Sending Email To:</h3><ol>";
		$file = fopen('../DataFiles/subscribers.csv', 'rb');
		while (($data = fgetcsv($file)) !== FALSE) {
			echo "<li>$data[0] ($data[1])</li>" ;
			$recipients[] = $data[1];
		}
    echo "</ol>";
    fclose($file);	
	
	$result = $mailer->send($recipients, $headers, $message);

if (PEAR::isError($result)) {
	echo 'Error sending email.';
        echo $result->getMessage();
} else {
	echo 'Email Sent Successfully.';
}

?>

<?php
	require '../view/footercontent.php';
?>

