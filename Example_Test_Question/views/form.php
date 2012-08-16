<html><body>
	
	<h1>List of CD's</h1>
	<table>
    	<tr>
        	<th>Id</th>
            <th>Name</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
            </tr>
        <?php endforeach; ?>
        
                <td>
	                <form action="index.php" method='POST'>
		            	<label>CD to Enter</label>
						<input type="text" name="cd" /><br />
						<input type="submit" value="Add">
					</form>
                </td>
	</table>

</body></html>