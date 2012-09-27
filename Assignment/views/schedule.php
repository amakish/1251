<!DOCTYPE html>
<html id="amakstats_com" lang="en">
<head>
	<meta charset="utf-8">
	<!--[if lte IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>aMaK Stats | NHL Schedule</title>
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
		Last Revised: 	20120927
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
								<th class="selectbox" scope="col">
									<p class="searchbutton">
										<input type='submit' name='action' value='Search' />
									</p>
								</th>
							</tr>
							
						</thead>
						
						<tbody>
							<tr>
								<td class="selectbox">
									<select id="season" name="season" class="dropDownBox">
										<option value="201112" selected="selected">2011-12</option>
										<option value="201011">2010-11</option>
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
								</td>>
								<td class="searchbutton">
								</td>
							</tr>
						</tbody>
					</table><!-- / #statsTableForm -->

				</form>
				
				<table id="schedTable">
					<caption class="tableCaption">2011-12 Skater Statistics - Scoring</caption>
					<thead>
						<tr>
							<th scope="col">Date</th>
							<th scope="col">Visiting Team</th>
							<th scope="col">Home Team</th>
							<th scope="col">Time</th>
						</tr>
					</thead>
					<tbody>

					<?php 
					$i=0;
					$sSchedule = new schedule();
					foreach($sSchedule->find("1") as $sGame){
					$i++;
						?>
						<tr>
							<td><?php echo $sGame->date;?></td>
							<td><?php echo $sGame->vteam;?></td>
							<td><?php echo $sGame->hteam;?></td>
							<td><?php echo $sGame->time;?></td>
							<td><?php echo $sGame->result;?></td>
						</tr>
				<?php } ?>
					</tbody>
				</table><!-- / #schedTable -->
			</article>
		</section><!-- / #content -->
		<!-- footer -->
			<?php 
				include 'footer.php'
			?>
		<!-- / footer -->		
	</div><!-- / #page -->
</body>
</html>