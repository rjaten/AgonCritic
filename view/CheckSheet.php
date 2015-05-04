<?php
    require "../view/headercontent.php";
?>
	<div id="wrapper">

		<table width="100%" border="1">
    <tbody><tr> 
      <th>CIS 370 Assignment 4 Specific Requirements
      </th><th>How to test this feature.</th>
      <th>Works Completely<br>
        (Yes/No)</th>
    </tr>
    <tr> 
      <td>1.	Create an interface to add new data to your database. </td>
      <td>Games/Add A Game</td>
      <td>Yes</td>
    </tr>
    <tr>
      <td class="indent1">b. Provide appropriate HTML controls to input data
        including textboxes, selection boxes, radio buttons, checkboxes, calendar
      controls, etc.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr> 
      <td class="indent2">i. Include at least one selection box, checkbox (or
      radio button), and date input (via text or date) on your input form.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="indent2">ii. Require at least one field as a minimum to make
      data valid.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td class="indent2">iii.	Show a red * on form for required fields.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="indent1">c. Validate all data on the client-side and server
      side where appropriate.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr>
      <td class="indent1">d. Make sure you can enter special characters such
        as single and double quotes, commas, ampersands, brackets, braces, and
      angle-brackets into text fields without causing errors.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr>
      <td class="indent1">e. Dates should show and be entered in MM/DD/YYYY format
      but be stored in the database as date fields.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr>
      <td class="indent1">f. After successful addition of a new entry, take them
      to the details-view form.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr>
      <td class="indent1">g. If errors are found server-side, return them to
        the add screen with any entered data visible and a message to indicate
      all errors.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr> 
      <td>2.	Create an interface to edit data in your database.</td>
      <td>Go to details of a game then click delete button</td>
      <td>y</td>
    </tr>
    <tr>
      <td class="indent1">b. Try to share as much code as possible with your
      Add form.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>3.	Provide an interface to delete data in your database.</td>
      <td>Go to details of a game then click delete button</td>
      <td>y</td>
    </tr>
    <tr> 
      <td class="indent1">b. Require the user to confirm the deletion and only
      delete if they say so.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td class="indent2">
        i. If they cancel the deletion, leave them on the display
          form.
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>4.	Make your code portable.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr> 
      <td class="indent1">a. Protect against Cross Site Scripting attacks (HTML
      injection).</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td class="indent1">b. Your code should work with or without gpc_magic_quotes
      turned on.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#CCCCCC">
        <div align="center"><strong><font size="+1">Security Features</font></strong></div>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>6. Integrate a security mechanism into your application that supports
      adding, changing, and deleting users, functions, and roles.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr> 
      <td class="indent1">a. Adapt the format of the code provided to fit into
        your theme with your headers, footers, color schemes, and navigation
      system.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr> 
      <td class="indent1">b. Include a mechanism in your navigation system to
      support your security features.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr>
      <td class="indent2">i. Log In or Log Out should appear at the main menu
      level.</td>
      <td>top right</td>
      <td>y</td>
    </tr>
   <tr>
      <td class="indent2">ii. Redirect to use a secure connectin for the login screen.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr> 
      <td class="indent1">c. Set up users, functions, and roles appropriate for
      your application.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr> 
      <td class="indent2">i.	Include an admin account with username “admin” and
      password “admin” with full access.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr> 
      <td class="indent2">ii.	Include a read-only account with username of “reader” and
      password of “reader”.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr> 
      <td class="indent1">d. Links for features that the current user does not
      have access to should either not show or be disabled (if it is a button). </td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr>
      <td class="indent2">i.	This includes items in your navigation system.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
    <tr> 
      <td class="indent2">ii. If a user attempts to go directly to a page (perhaps
        via a bookmark) and they are not currently logged in, and the page is
        not available to guests, bring up the login page in-line and then forward
      them on to their originally desired page.</td>
      <td>&nbsp;</td>
      <td>y</td>
    </tr>
  </tbody></table>


	</div>
<?php
    require '../view/footercontent.php'
?>
