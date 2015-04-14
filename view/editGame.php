<?php
	$title = "Add Game";
	require '../view/headercontent.php';
?>
<div>
	<h1>Add Game</h1>

	<form id="BeerForm" action="../controller/controller.php?action=ProcessAddEdit" method="post"">
		<div class="formRow">
			<label for="Game">Game:<span class="required">*</span></label>
			<input type="text" name="Name" id="Name" value="<?php echo $name ?>" required 
				   required size="20" maxlength="30" autofocus/>
		</div>
		<div class="formRow">
			<label for="Publisher">Publisher(s):<span class="required">*</span></label>
			<input type="text" name="Brewery" id="Brewery" value="<?php echo $brewery ?>" 
				   required size="20" maxlength="30"/>
		</div>
		<div class="formRow">
			<label for="Developer">Developer(s):<span class="required">*</span></label>
			<input type="text" name="Style" id="Style" value="<?php echo $style ?>" 
				   required size="20" maxlength="20"/>
		</div>
		<div class="formRow">
			<label for="Alcohol">Alcohol:</label>
			<input type="number" name="Alcohol" id="Alcohol" value="<?php echo $alcohol ?>" 
				   min="0" max="15"/>
		</div>
		<div class="formRow">
			<label for="IBU">IBU:</label>
			<input type="number" name="IBU" id="IBU" value="<?php echo $IBU ?>"
				   min="0" max="100"/>
		</div>
		<div class="formRow">
			<label for="Local">Local:</label>
			<input type="checkbox" name="Local" id="Local" <?php if ($local == 'Y') echo 'checked' ?> />
		</div>
		<div class="formRow">
			<label for="AvailableSince">Avail Since:</label>
			<input type="date" name="AvailableSince" id="AvailableSince" value="<?php echo toDisplayDate($availableSince) ?>" />
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
	require '../view/footerInclude.php';
?>
