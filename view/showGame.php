<?php
	require '../view/headercontent.php';
?>
<div>
    <h1 class="cen"> <?php echo $row['Name'] ?> </h1><br>
    <table>           
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
                    Our Rating: <?php echo $row['Rating'] ?><br>
                    <form>
                        <button onclick="document.location='../controller/controller.php?action=EditGame&GameID=<?php echo $row['GameID']; ?>';"> 
                            Edit
                        </button>
                        <button style="margin-left: 15px"onclick="checkDelete()" >
                            Delete
                        </button>
                    </form>
		</td>
            </tr>
	</tbody>
    </table>
</div>


<script>
    function checkDelete()
    {
        var isOkay = confirm("Are you sure you want to delete this game yo?");
        if(isOkay == true)
            document.location="../controller/controller.php?action=DeleteGame&GameID=<?php echo $row['GameID']; ?>";
        else
            return;
    }
</script>
<?php
	require '../view/footercontent.php';
?>