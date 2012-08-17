<html><body>
<?php foreach($aMyCDs as $aCD) {?>
		<p>
			<?php echo $aCD['name'];?>
		</p>
	<?php } ?>

<form action='.' method="post">
	<input type="text" name="title" />
	<input type="submit" value="Add" />

</form>

</body></html>