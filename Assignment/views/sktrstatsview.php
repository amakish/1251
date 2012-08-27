<html>
<body>
	<table>
		<tr>
		<?php foreach(sktrstat::find('all') as $sSktrStats){?>
			<?php echo $sSktrStats->rk;?>
			<?php echo $sSktrStats->player;?>
			<?php echo $sSktrStats->team;?>
			<?php echo $sSktrStats->pos;?>
			<?php echo $sSktrStats->gp;?>
			<?php echo $sSktrStats->g;?>
			<?php echo $sSktrStats->a;?>
			<?php echo $sSktrStats->pts;?>
			<?php echo $sSktrStats->plusminus;?>
			<?php echo $sSktrStats->pim;?>
			<?php echo $sSktrStats->ppg;?>
			<?php echo $sSktrStats->shg;?>
			<?php echo $sSktrStats->gwg;?>
			<?php echo $sSktrStats->otg;?>
			<?php echo $sSktrStats->sog;?>
			<?php echo $sSktrStats->shtpct;?>
			<?php echo $sSktrStats->toiperg;?>
			<?php echo $sSktrStats->shftperg;?>
			<?php echo $sSktrStats->fopct;?>
			<?php echo $sSktrStats->esg;?>
			<?php echo $sSktrStats->esa;?>
			<?php echo $sSktrStats->espts;?>
			<?php echo $sSktrStats->ppa;?>
			<?php echo $sSktrStats->pppts;?>
			<?php echo $sSktrStats->sha;?>
			<?php echo $sSktrStats->shpts;?>
			<?php echo $sSktrStats->estoi;?>
			<?php echo $sSktrStats->estoiperg;?>
			<?php echo $sSktrStats->shtoi;?>
			<?php echo $sSktrStats->shtoiperg;?>
			<?php echo $sSktrStats->pptoi;?>
			<?php echo $sSktrStats->pptoiperg;?>
			<?php echo $sSktrStats->toi;?>
			<?php echo $sSktrStats->toiperg;?>
			<?php echo $sSktrStats->shft;?>
			<?php echo $sSktrStats->toipershft;?>
			<?php echo $sSktrStats->shftperg;?>
	<?php } ?>
		</tr>
	</table>
</body>
</html>