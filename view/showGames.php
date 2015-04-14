<?php
	require '../view/headercontent.php';
?>

<div>
    <table>
	<tbody>
			
            <?php foreach ($results as $row) {  
			
            ?>
				
            <tr>
                <td>
                    <a href="../controller/controller.php?action=ShowGame&GameID=<?php echo $row['Game_ID'] ?>">
                        <img src=<?php echo $row['Picture']?> alt="<?php echo $row['Name']?>"> 
                    </a>
                </td>
		<td>
                    <a class="cen" href="../controller/controller.php?action=ShowGame&GameID=<?php echo $row['Game_ID']?>">
                        <?php echo $row['Name'] ?>  
                    </a><br>
                    Genre: <?php echo $row['Genre'] ?><br>
                    Publisher(s): <?php echo $row['Publisher'] ?><br>
                    Developer(s): <?php echo $row['Developer'] ?><br>
                    Console(s): <?php echo $row['Console'] ?><br>
                    Release Date: <?php echo $row['ReleaseDate'] ?><br>
                    Our Rating: <?php echo $row['Rating'] ?>
		</td>
            </tr>
			
            <?php } ?>
			
	</tbody>
    </table>
    <!-- <img class="fr" src="../images/sideImage2.png" alt="Hotline Miami 2"> -->
</div>

<?php
	require '../view/footercontent.php';
?>
