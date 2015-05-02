<?php
	require '../view/headercontent.php';
?>
<div>
    <table>
        <thead>
            <tr>
                <th><?php echo $row['Name'] ?>  <br></th>
            </tr>
        </thead>
	<tbody>	
            <tr>
                <td>
                    <img src=<?php echo $row['Picture']?> alt="<?php echo $row['Name']?>"> 
                </td>
                <td>
                    Genre: <?php echo $row['Genre'] ?><br>
                    Publisher(s): <?php echo $row['Publisher'] ?><br>
                    Developer(s): <?php echo $row['Developer'] ?><br>
                    Console(s): <?php echo $row['Console'] ?><br>
                    Release Date: <?php echo $row['ReleaseDate'] ?><br>
                    Our Rating: <?php echo $row['Rating'] ?>
		</td>
            </tr>
	</tbody>
    </table>
</div>

<?php
	require '../view/footercontent.php';
?>