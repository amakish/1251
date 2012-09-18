<table>
	<tr><th>Date Posted</th><th>Title</th><th>Link</th><th>Next Action</th></tr>
	<?php foreach(Job::find('all') as $oJob){ ?>
	<tr><td>
	<?php echo $oJob->pubdate; ?>
	</td>
	<td>
		<?php echo $oJob->title; ?>
		</td>
		<td>
		<?php echo $oJob->link; ?>
	</td>
	<td>
		<a href='?action=next&id=<?php echo $oJob->id?>'>
		<?php if(empty($oJob->nextaction)){
					echo 'click to enter next action';
				}else{
					echo $oJob->nextaction ;
				}
		?>
		</a>
	</td>
	<?php } ?>
</table>