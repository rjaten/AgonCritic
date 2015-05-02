<?php
	require '../view/headercontent.php';
?>
<div class=" detailForm mA">
	<h1>Add Game</h1>

	<form id="" action="../controller/controller.php?action=ProcessAddEdit" method="post">
            
            <input type="hidden" name="GameID" value="<?php echo $gameID ?>" />
            <input type="hidden" name="Mode" value="<?php echo $mode ?>" />
            
            <div class="formRow">
		<label for="Game">Game Name:<span class="required">*</span></label>
		<input type="text" name="Name" id="" value="<?php echo $name ?>" required 
                    size="20" maxlength="50" autofocus/>
            </div>
            
            <div class="formRow mA">
		<label for="Game">Game Name:<span class="required">*</span></label>
		<input type="file" name="Picture" id="" value="<?php echo $picture ?>"/>
            </div>
            
            <div class="formRow">
                <label>Genre:<span class="required">*</span></label>
                <select name="Genre" required>
                    <option value="Action">Action</option>
                    <option value="RPG">Fighting</option>
                    <option value="FPS">First-Person Shooter</option> 
                    <option value="Horror">Horror</option>
                    <option value="Indie">Indie</option>
                    <option value="Music">Music & Party</option>
                    <option value="RTS">Real-Time Strategy</option>
                    <option value="RPG">Role-Playing Game</option> 
                    <option value="Simulation">Simulation</option>
                    <option value="Sports">Sports</option>
                    <option value="TPS">Third-Person Shooter</option>
                </select>
            </div>
            
            <div class="formRow">
                <label for="Publisher">Console(s):<span class="required">*</span></label>
		<input type="text" name="Console" id="" value="<?php echo $console ?>" 
                    required size="20" maxlength="100"/>
            </div>
            
            <div class="formRow">
		<label for="Publisher">Publisher(s):</label>
		<input type="text" name="Publisher" id="" value="<?php echo $publisher ?>" 
                    size="20" maxlength="100"/>
            </div>
            
            <div class="formRow">
		<label for="Developer">Developer(s):</label>
		<input type="text" name="Developer" id="" value="<?php echo $developer ?>" 
                    size="20" maxlength="100"/>
            </div>
            
            <div class="formRow">
		<label for="ReleaseDate">Release Date:<span class="required">*</span></label>
                <input type="date" name="ReleaseDate" id="" value="<?php echo $releasedate ?>" required/>
            </div>
            
            <div class="formRow">
                <label for="Rating">Our Rating:<span class="required">*</span></label>
		<input type="number" name="Rating" id="" value="<?php echo $rating ?>"
                   required min="0" max="10" step="0.1"/>
            </div>
            
            <div class="formRow">
		<label for="isNew">Was this game released this month?<span class="required">*</span></label>
                <input type="checkbox" name="isNew" id="" <?php if ($isNew == 1)echo 'checked' ?> />
            </div>
            
            <div class="formRow">
                <input type="submit" name="SubmitButton" value="Save" />
            </div>
            
	</form>
</div>
<script>
	<?php
		if (!empty($errors)) {
			echo "alert('Please correct the following errors:\\n$errors');";
		}
	?>
</script>

<?php
	require '../view/footercontent.php';
?>
