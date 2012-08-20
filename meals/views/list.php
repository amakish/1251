<html>
<body>
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
			
	</table>

</body>
</html>
