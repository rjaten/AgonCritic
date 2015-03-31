<?php
    require "../view/headercontent.php";
?>
	<div id="wrapper">

		<table border="1" width="100%">
			<tbody><tr><th>Specific Requirement</th><th>How to Test<br/>(if not obvious)</th><th>Works Completely<br>(Yes/No)</th></tr>
			<tr><td>1.	Header, Footer, and Nav included via PHP.</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td class="indent1">a.	Footer includes date/time main content portion of page last modified.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent1">b.	Footer includes mini-nav with contact and About links.</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td>2.	All source files organized into proper folders.</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td>3.	Automatic redirection from top of your web space to proper location for this assignment.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td>4.	Email sign-up link in main navigation or on Home page.</td><td>Click the newsletter icon.</td><td>yes</td></tr>
			<tr><td class="indent1">a.	Validate e-mail before saving on client and server.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent1">b.	New addresses successfully added.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent1">c.	Success or error page responds when appropriate.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td>5.	File Management link in Admin menu.</td><td>&nbsp;</td><td>Yes</td></tr>
			<tr><td class="indent1">a.	Upload page provides a list of all current files in the directory.</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td class="indent1">b.  Proper permissions are set on server folders to allow uploads.</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td class="indent1">c.	Newsletter-Type File Upload Mechanism</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td class="indent2">i.	HTML self-contained file with fonts and colors.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent2">ii.	File can be seen via link on home page showing most recently uploaded version.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent2">iii.  Upload gives error if not an HTML file.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent1">d.	Quote File Upload Mechanism</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td class="indent2">i.	Text file with one line per quote.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent2">ii.	Upload gives error if not a text file.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent2">iii. Link on File Management page to see the current Quote File.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent1">e.	Image File Uploads</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td class="indent2">i.	Allow additional image files to upload.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent2">ii.	Only allow jpeg, gif, and png formats.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent2">iii. On successful upload list all files.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent2">iv.	New images may appear on home page.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent2">v.	Validate and notify if image size matters.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td>6.	Sending of Bulk E-Mails</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td class="indent1">a.	Newsletter-Type file is body of the message.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent1">b.	E-Mail is sent to all recipients that have signed up.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent1">c.	No recipient should be able to see the email address of others.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent1">d.	Confirmation page shows all addresses who received a message.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent1">e.	E-Mail is properly addressed to help avoid going to SPAM folders.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td>7.	This sheet linked in to your site under the Help menu.</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td>8.	All pages pass the validation/conformance checks for the specified version of HTML and CSS</td><td>don't use ticker.css yet so it doesn't validate. bootstrap doesn't validate.</td><td>'yes'</td></tr>
			<tr><td>9.	Complete site published to cisprod public_html folder (including redirection).</td><td>&nbsp;</td><td>yes</td></tr>
			<tr><td class="indent1">a.	Create a .zip file of your whole site and turn it in to the appropriate folder on D2L.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td></td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><th colspan="2">Extra Credit</th></tr>
			<tr><td></td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td>10.	Provide a mechanism to delete unwanted image files.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td>11.	Show a random quote in your footer.  The quote should 
come from the Quote file (above) that may be replaced via upload at any 
time by the user.</td><td>it's in the header. same nav bar that has 'Login/Signup on it.</td><td>yes</td></tr>
			<tr><td>12.	Include a "Remember Me" checkbox on e-mail signup page.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td class="indent1">a.	Include a "Welcome First Name" in header if they wanted to be remembered on that machine.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td>13.	When adding an e-mail address to receive messages, also 
validate that any new e-mail added does not already exist on the file 
before adding it.  If the address was already in the list, give them an 
appropriate message indicating this.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td>14.	Allow multi-file selection of images in the upload.</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		</tbody></table>
	</div>
<?php
    require '../view/footercontent.php'
?>
