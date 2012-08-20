<html>
<body>
	<h1>Days we ate together</h1>
	<form action='.' method='post' />
		<table>
			<tr>
				<th>
					<td>date</td>
					<td>members</td>
				</th>
			</tr>
			
			<?php foreach(Meal::find('all') as $oMeal){?>
				<tr>
					<td><?php echo $oMeal->date ?></td>
					<td><?php echo $oMeal->members ?></td>
				</tr>
			<?php } ?>			
			
			<tr>
				<td><input type='text' name='date' /></td>	
				<td><input type='text' name='members' /></td>	
				<td><input type='submit' name='add' value='add' /></td>
			</tr>
		</table>
	</form>
</body>
</html>
