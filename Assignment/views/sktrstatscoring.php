<!DOCTYPE html>
<html id="amakstats_com" lang="en">
<head>
	<meta charset="utf-8">
	<!--[if lte IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>aMaK Stats</title>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<meta content="aMaK Stats" name="title">
	<link href="css/main.css" rel="stylesheet">
	<!--[if IE 9]><link rel="stylesheet" href="/c/ie9.css" type="text/css"/><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="/c/ie8.css" type="text/css"/><![endif]-->
	<!--[if lte IE 7]><link rel="stylesheet" href="/c/ie7.css" type="text/css"/><![endif]-->
	<!--[if lte IE 6]><link rel="stylesheet" href="/c/ie6.css" type="text/css"/><![endif]-->
	<!--
		Website: 		aMaK Stats Inc | NHL Hockey Stats, Schedule | Fantasy Hockey Resource
		URL:	 		http://www.amakstats.com
		Developer: 		Aaron Makish
		Date Created: 	20120828
		Last Revised: 	20120923
		Language:		HTML5
	
		Website Description:
						NHL Hockey Stats, Schedule | Fantasy Hockey Resource
			
		External files:
						main.css
	-->
</head>
<body id="www-amakstats-com">
	<div id="page">
		<!-- header -->
			<?php 
				include 'header.php'
			?>
		<!-- / header -->
		<!-- #content -->
		<section id="contentwrap">
			<article role="main" id="content">
				<form method="POST" action=".">
					<table id="statsTableForm">
						<h1 class="lede"><abbr title="National Hockey League">NHL </abbr><b>Player </b>Statistics</h1>
						<thead>
							<tr>
								<th class="selectbox" scope="col">Season</th>
								<th class="selectbox" scope="col">Game Type</th>
								<th class="selectbox" scope="col">Team</th>
								<th class="selectbox" scope="col">Position</th>
								<th class="selectbox" scope="col">Scoring View</th>
								<th class="selectbox" scope="col">Player Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="selectbox">
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
								<td class="selectbox">
									<select id="gameType" name="gameType" class="dropDownBox">
										<option value="1"  selected="selected">Regular Season</option>
										<option value="2">Playoffs</option>
									</select>
								</td>
								<td class="selectbox">
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
								<td class="selectbox">	
									<select id="position" name="position" class="dropDownBox">
										<option value="S" selected="selected">All Skaters</option>
										<option value="F">Forwards</option>
										<option value="D">Defenseman</option>
										<option value="G">Goalies</option>
									</select>
								</td>
								<td class="selectbox">	
									<select id="statview" name="statview" class="dropDownBox">
										<option value="scoring" selected="selected">Standard</option>
										<option value="icetime">Ice Time Splits</option>
									</select>
								</td>
								<td class="selectbox">	
									<select id="playerstatus" name="playerstatus" class="dropDownBox">
										<option value="All" selected="selected">All Players</option>
										<option value="Rookie">Rookies</option>
									</select>
								</td>
								<td class="searchbutton">
									<input type='submit' name='action' value='Search' />
								</td>
							</tr>
						</tbody>
					</table><!-- / #statsTableForm -->
				</form>
				<table id="statTable" class="sortable">
					<caption class="tableCaption">2011-12 Skater Statistics - Scoring</caption>
					<thead>
						<tr>
							<th scope="col"></th>
							<th scope="col" class="leftalign">Name</th>
							<th scope="col">Age</th>
							<th scope="col">Team</th>
							<th scope="col">Pos</th>
							<th scope="col">GP</th>
							<th scope="col">G</th>
							<th scope="col">A</th>
							<th scope="col">Pts</th>
							<th scope="col">+/-</th>
							<th scope="col">PIM</th>
							<th scope="col">PPG</th>
							<th scope="col">SHG</th>
							<th scope="col">GWG</th>
							<th scope="col">OTG</th>
							<th scope="col">SOG</th>
							<th scope="col">S%</th>
							<th scope="col">FO%</th>
							<th scope="col">TOI/G</th>
							<th scope="col">PP TOI/G</th>
							<th scope="col">SH TOI/G</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$i=0;
					$sSktrStats = new sktrstat();
					foreach($sSktrStats->find("1") as $sSktrStats){
					$i++;
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td class="leftalign"><?php echo $sSktrStats->name;?></td>
							<td><?php echo $sSktrStats->age;?></td>
							<td><?php echo $sSktrStats->teamcur;?></td>
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
							<td><?php echo $sSktrStats->pptoiperg;?></td>
							<td><?php echo $sSktrStats->shtoiperg;?></td>
						</tr>
				<?php } ?>
					</tbody>
				</table><!-- / #statTable -->
			</article>
		</section><!-- / #content -->
		<!-- footer -->
			<?php 
				include 'footer.php'
			?>
		<!-- / footer -->		
	</div><!-- / #page -->
	<!-- JavaScript link -->
	<script src="js/sortable.js"></script>
</body>
</html>