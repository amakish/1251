<!DOCTYPE html>
<!--
	Website: 		aMaK Stats Inc | NHL Hockey Stats, Schedule | Fantasy Hockey Resource
	URL:	 		http://www.amakstats.com
	Developer: 		Aaron Makish
	Date Created: 	20120828
	Last Revised: 	20120828
	Language:		HTML5

	Website Description:
					NHL Hockey Stats, Schedule | Fantasy Hockey Resource
		
	External files:
					main.css
-->
<!--[if lt IE 7 ]> <html lang="en-us" class="ie6"> <![endif]-->
<!--[if IE 7 ]> <html lang="en-us" class="ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en-us" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<title>aMaK Stats Inc</title>
	<meta content="true" name="HandheldFriendly">
	<meta content="320" name="MobileOptimized">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="author" content="Aaron Makish"/>
	<meta name="description" content="NHL statistics &amp; schedule fantasy hockey resource" />
	<meta name="keywords" content="NHL hockey statistics schedule fantasy tool resource" />
	<!-- CSS link -->
	<link rel="stylesheet" href="./views/css/main.css" />
	<!-- JavaScript link -->
	<script src="./views/js/sortable.js"></script>
	<!-- Favicon links 
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png" />
	-->
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="page">
		<!-- ==== START HEADER ==== -->
		<header id="header" role="banner">
			<div class="container">
				<h1><a href="#"><img src="./views/images/logo.png" alt="aMaK Stats" title="" width="350" height="160" /></a></h1>
				<nav role="navigation">
					<ul class="nav">
						<li><a href="?action=overview">Overview</a></li>
						<li><a href="?action=additional">Additional Stats</a></li>
					</ul>
				</nav>
			</div>
			<!-- end .container -->
		</header>
		<!-- end #header -->
		<!-- ==== START MAIN CONTENT ==== -->
		<div id="main" role="main" >
			<table class="sortable">
				<caption>2011-12 NHL Skater Statistics</caption>
				<thead>
					<tr>
						<th scope="col"></th>
						<th scope="col" class="left">Player</th>
						<th scope="col">Team</th>
						<th scope="col">Pos</th>
						<th scope="col">GP</th>
						<th scope="col">ESG</th>
						<th scope="col">ESA</th>
						<th scope="col">ESPts</th>
						<th scope="col">PPA</th>
						<th scope="col">PPG</th>
						<th scope="col">PPPts</th>
						<th scope="col">SHA</th>
						<th scope="col">SHG</th>
						<th scope="col">SHPts</th>
						<th scope="col">ES TOI/G</th>
						<th scope="col">PP TOI/G</th>
						<th scope="col">SH TOI/G</th>
						<th scope="col">TOI/G</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$i=0;
				foreach(SktrStat::find('all') as $sSktrStats){
				$i++;
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td class="left"><?php echo $sSktrStats->player;?></td>
						<td><?php echo $sSktrStats->teamcur;?></td>
						<td><?php echo $sSktrStats->pos;?></td>
						<td><?php echo $sSktrStats->gp;?></td>
						<td><?php echo $sSktrStats->esg;?></td>
						<td><?php echo $sSktrStats->esa;?></td>
						<td><?php echo $sSktrStats->espts;?></td>
						<td><?php echo $sSktrStats->ppa;?></td>
						<td><?php echo $sSktrStats->ppg;?></td>
						<td><?php echo $sSktrStats->pppts;?></td>
						<td><?php echo $sSktrStats->sha;?></td>
						<td><?php echo $sSktrStats->shg;?></td>
						<td><?php echo $sSktrStats->shpts;?></td>
						<td><?php echo $sSktrStats->estoiperg;?></td>
						<td><?php echo $sSktrStats->pptoiperg;?></td>
						<td><?php echo $sSktrStats->shtoiperg;?></td>
						<td><?php echo $sSktrStats->toiperg;?></td>
					</tr>
			<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- end MAIN CONTENT -->
		<!-- ==== START FOOTER ==== -->
		<footer id="footer" role="contentinfo">
			<div class="container">
				<div id="copy">
					<p><a href="#"><img src="../views/images/logo-white.png" alt="aMak Stats Inc" title="" width="101" height="35" /></a></p>
					<p>&copy; 2012</p>
				</div>
				<!-- end #copy -->
			</div>
			<!-- end .container -->
		</footer>
		<!-- end #footer -->
	</div>
	<!-- #page -->
</body>
</html>