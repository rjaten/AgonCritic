<?php
	$title = "Register Member";
	require '../view/headercontent.php';
?>
<h1>Subscribe to the Newsletter!</h1>

<form action="../controller/controller.php?action=ProcessSignups" method="post">
    <label>First Name: </label>
    <input type="text" name="FirstName" required ><br />
    <label>Email: </label>
    <input type="email" name="Email" required ><br />
    <input type="submit" value="Subscribe">
</form>
<p></p>
<?php
	require '../view/footercontent.php';
?>
