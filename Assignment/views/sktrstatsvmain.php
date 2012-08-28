<html>
<body>
	<h1>2011-12 NHL Skater Statistics</h1>
	<ul>
		<li>Main Statistics</li>
		<li>Special Teams & Ice Time</li>
	</ul>
	<table>
		<thead>
			<tr>
				<td>RK</td>
				<td>Player</td>
				<td>Team</td>
				<td>Pos</td>
				<td>GP</td>
				<td>G</td>
				<td>A</td>
				<td>Pts</td>
				<td>+/-</td>
				<td>PIM</td>
				<td>PPG</td>
				<td>SHG</td>
				<td>GWG</td>
				<td>OTG</td>
				<td>SOG</td>
				<td>Sht %</td>
				<td>FO %</td>
				<td>TOI/G</td>
				<td>PP TOI</td>
				<td>PP TOI/G</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach(SktrStat::find('all') as $sSktrStats){?>
			<tr>
				<td><?php echo $sSktrStats->rk;?></td>
				<td><?php echo $sSktrStats->player;?></td>
				<td><?php echo $sSktrStats->team;?></td>
				<td><?php echo $sSktrStats->pos;?></td>
				<td><?php echo $sSktrStats->gp;?></td>
				<td><?php echo $sSktrStats->g;?></td>
				<td><?php echo $sSktrStats->a;?></td>
				<td><?php echo $sSktrStats->pts;?></td>
				<td><?php echo $sSktrStats->plusminus;?></td>
				<td><?php echo $sSktrStats->pim;?></td>
				<td><?php echo $sSktrStats->ppg;?></td>
				<td><?php echo $sSktrStats->shg;?></td>
				<td><?php echo $sSktrStats->gwg;?></td>
				<td><?php echo $sSktrStats->otg;?></td>
				<td><?php echo $sSktrStats->sog;?></td>
				<td><?php echo $sSktrStats->shtpct;?></td>
				<td><?php echo $sSktrStats->fopct;?></td>
				<td><?php echo $sSktrStats->toiperg;?></td>
				<td><?php echo $sSktrStats->pptoi;?></td>
				<td><?php echo $sSktrStats->pptoiperg;?></td>
			</tr>
	<?php } ?>
		</tbody>
	</table>
</body>
</html>