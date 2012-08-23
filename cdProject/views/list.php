<html><body>
<?php foreach(CD::find('all') as $sCD){?>
	<p>
		<?php echo $sCD->name;?>
	</p>
<?php } ?>


<form action='.' method="post">
<input type='text' name='label' /> <input type='submit' value='add' />

</form>

</body></html>
