<html>
<body>
	<table>
		<?php foreach(SktrStat::find('all') as $sSktrStats){?>
			<tr>
				<td><?php echo $sSktrStats->esg;?></td>
				<td><?php echo $sSktrStats->esa;?></td>
				<td><?php echo $sSktrStats->espts;?></td>
				<td><?php echo $sSktrStats->ppa;?></td>
				<td><?php echo $sSktrStats->pppts;?></td>
				<td><?php echo $sSktrStats->sha;?></td>
				<td><?php echo $sSktrStats->shpts;?></td>
				<td><?php echo $sSktrStats->estoi;?></td>
				<td><?php echo $sSktrStats->estoiperg;?></td>
				<td><?php echo $sSktrStats->shtoi;?></td>
				<td><?php echo $sSktrStats->shtoiperg;?></td>
				<td><?php echo $sSktrStats->toi;?></td>
				<td><?php echo $sSktrStats->toiperg;?></td>
				<td><?php echo $sSktrStats->shft;?></td>
				<td><?php echo $sSktrStats->shftperg;?></td>		
				<td><?php echo $sSktrStats->toipershft;?></td>
				<td><?php echo $sSktrStats->shftperg;?></td>
			</tr>
	<?php } ?>
	</table>
</body>
</html>