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
                <td>
                    <?php if (userIsAuthorized("EditGame")) { ?>
                        <button onclick="document.location = '../controller/controller.php?action=EditGame&GameID=<?php echo $row['Game_ID']; ?>';">Edit Game</button>
                    <?php 
			} 
			if (userIsAuthorized("DeleteGame")) { 
                    ?>
                        <button onclick="checkDelete();">Delete Game</button>
                    <?php } ?>
                </td>
            </tr>
	</tbody>
    </table>
</div>

<script>
    
function checkDelete() {
    answer = confirm('Are you sure you want to delete this game from records?');
    
    if(answer)
        document.location = '../controller/controller.php?action=DeleteGame&GameID=<?php echo $row['Game_ID']; ?>';
    else
        return;
}

</script>

<?php
	require '../view/footercontent.php';
?>