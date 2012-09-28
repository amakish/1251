<!DOCTYPE html>
<!--
	Website: 		aMaK Stats Inc | NHL Hockey Stats, Schedule | Fantasy Hockey Resource
	URL:	 		http://www.amakstats.com
	Developer: 		Aaron Makish
	Date Created: 	20120828
	Last Revised: 	20120917
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
	<link rel="stylesheet" href="../public/css/main.css" />
	<!-- JavaScript link -->
	<script src="../public/js/sortable.js"></script>
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
		<?php 
			include 'header.php'
		?>
		<!-- end #header -->
		<!-- ==== START MAIN CONTENT ==== -->
		<div id="main" role="main" >
			<div id="pageBackground" class="container">
				<div id="pageBody" class="container">
					<table id="statsFormTable">
						<caption>Player Statistics</caption>
						<thead>
							<tr>
								<th scope="col">Season</th>
								<th scope="col">Game Type</th>
								<th scope="col">Team</th>
								<th scope="col">Position</th>
								<th scope="col">Scoring View</th>
								<th scope="col">Player Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<select id="season" name="season" class="dropDownBox">
										<option value="201112" selected="selected">2011-12</option>
										<option value="201011">2010-11</option>
										<option value="200910">2009-10</option>
										<option value="200809">2008-09</option>
										<option value="200708">2007-08</option>
										<option value="200607">2006-07</option>
										<option value="200506">2005-06</option>
										<option value="200405">2004-05</option>
										<option value="200304">2003-04</option>
										<option value="200203">2002-03</option>
										<option value="200102">2001-02</option>
										<option value="200001">2000-01</option>
									</select>
								</td>
								<td>
									<select id="gameType" name="gameType" class="dropDownBox">
										<option value="1"  selected="selected">Regular Season</option>
										<option value="2">Playoffs</option>
									</select>
								</td>
								<td>
									<select id="team" name="team" class="dropDownBox">
										<option value="" selected="selected">All Teams</option>
										<option value="ANA">Anaheim Ducks</option>
										<option value="BOS">Boston Bruins</option>
										<option value="BUF">Buffalo Sabres</option>
										<option value="CGY">Calgary Flames</option>
										<option value="CAR">Carolina Hurricanes</option>
										<option value="CHI">Chicago Blackhawks</option>
										<option value="COL">Colorado Avalanche</option>
										<option value="CBJ">Columbus Blue Jackets</option>
										<option value="DAL">Dallas Stars</option>
										<option value="DET">Detroit Red Wings</option>
										<option value="EDM">Edmonton Oilers</option>
										<option value="FLA">Florida Panthers</option>
										<option value="LAK">Los Angeles Kings</option>
										<option value="MIN">Minnesota Wild</option>
										<option value="MTL">Montreal Canadiens</option>
										<option value="NSH">Nashville Predators</option>
										<option value="NJD">New Jersey Devils</option>
										<option value="NYI">New York Islanders</option>
										<option value="NYR">New York Rangers</option>
										<option value="OTT">Ottawa Senators</option>
										<option value="PHI">Philadelphia Flyers</option>
										<option value="PHX">Phoenix Coyotes</option>
										<option value="PIT">Pittsburgh Penguins</option>
										<option value="SJS">San Jose Sharks</option>
										<option value="STL">St. Louis Blues</option>
										<option value="TBL">Tampa Bay Lightning</option>
										<option value="TOR">Toronto Maple Leafs</option>
										<option value="VAN">Vancouver Canucks</option>
										<option value="WSH">Washington Capitals</option>
										<option value="WPG">Winnipeg Jets</option>
									</select>
								</td>
								<td>	
									<select id="position" name="position" class="dropDownBox">
										<option value="S" selected="selected">All Skaters</option>
										<option value="F">Forwards</option>
										<option value="D">Defenseman</option>
										<option value="G">Goalies</option>
									</select>
								</td>
								<td>	
									<select id="playerstatus" name="playerstatus" class="dropDownBox">
										<option value="All" selected="selected">All Players</option>
										<option value="Rookie">Rookies</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="sortable">
						<caption>2011-12 Skater Statistics - Ice Time Scoring Splits</caption>
						<thead>
							<tr>
								<tr>
									<th scope="col"></th>
									<th scope="col" class="left">Name</th>
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
							foreach($aSktrStats as $sSktrStats){
							$i++;
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td class="left"><?php echo $sSktrStats->name;?></td>
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
				<!-- end #pageBody -->	
			</div>
			<!-- end #pageBackground -->		
		</div>
		<!-- end MAIN CONTENT -->
		<!-- ==== START FOOTER ==== -->
		<?php 
			include 'footer.php'
		?>
		<!-- end #footer -->
	</div>
	<!-- #page -->
</body>
</html>