<!DOCTYPE html>
<html id="amakstats_com" lang="en">
<head>
	<meta charset="utf-8">
	<!--[if lte IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>aMaK Stats | Player Statistics</title>
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
		Last Revised: 	20121001
		Language:		HTML5
	
		Website Description:
						NHL Hockey Stats, Schedule | Fantasy Hockey Resource
			
		External files:
						main.css
	-->
</head>
<body id="top">
	<!-- header -->
		<?php 
			include 'header.php'
		?>
	<!-- / header -->
	<div id="container">
		<article role="main" class="main">
			<h1><abbr title="National Hockey League">NHL </abbr>Player Statistics</h1>
			<form method="POST" action=".">
				<p>
					<label>Season</label>
					<select id="season" name="season">
						<option value="201112" selected="selected">2011-12</option>
						<option value="201011">2010-11</option>
					</select>
				</p>
				<p>
					<label>Game Type</label>
					<select id="gameType" name="gameType">
						<option value="reg"  selected="selected">Regular Season</option>
						<option value="post">Playoffs</option>
					</select>
				</p>
				<p>
					<label>Scoring View</label>
					<select id="statview" name="statView">
						<option value="sstatscoring" selected="selected">Standard</option>
						<option value="sstaticetime">Ice Time Splits</option>
					</select>					
				</p>
				<p>
					<label>Team</label>
					<select id="team" name="team">
						<option value="All" selected="selected">All Teams</option>
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
				</p>
				<p>
					<label>Position</label>
					<select id="position" name="position">
						<option value="s" selected="selected">All Skaters</option>
						<option value="f">Forwards</option>
						<option value="d">Defenseman</option>
						<option value="g">Goalies</option>
					</select>
				</p>
				<p>
					<label>Player Status</label>
					<select id="playerstatus" name="playerStatus">
						<option value="All" selected="selected">All Players</option>
						<option value="Rookie">Rookies</option>
					</select>
				</p>
				<p class="searchbutton">
					<input type='submit' name='action' value='Search' />
				</p>
			</form>
			<table class="sortable">
				<caption class="tableCaption">2011-12 Goalie Statistics</caption>
				<thead>
					<tr>
						<th scope="col"></th>
						<th scope="col" class="name">Name</th>
						<th scope="col">Age</th>
						<th scope="col">Team</th>
						<th scope="col">Pos</th>
						<th scope="col">GP</th>
						<th scope="col">GS</th>
						<th scope="col">W</th>
						<th scope="col">L</th>
						<th scope="col">OTL</th>
						<th scope="col">SA</th>
						<th scope="col">GA</th>
						<th scope="col">GAA</th>
						<th scope="col">SV</th>
						<th scope="col">SV%</th>
						<th scope="col">SO</th>
						<th scope="col">G</th>
						<th scope="col">A</th>
						<th scope="col">PIM</th>
						<th scope="col">TOI</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i=0;
					foreach($aPlayerStats as $sGoalieStats){
					$i++;
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td class="l-align"><?php echo $sGoalieStats->name;?></td>
							<td class="l-align"><?php echo $sGoalieStats->age;?></td>
							<td class="c-align"><?php echo $sGoalieStats->teamcur;?></td>
							<td class="c-align"><?php echo $sGoalieStats->pos;?></td>
							<td class="c-align"><?php echo $sGoalieStats->gp;?></td>
							<td class="c-align"><?php echo $sGoalieStats->gs;?></td>
							<td class="c-align"><?php echo $sGoalieStats->w;?></td>
							<td class="c-align"><?php echo $sGoalieStats->l;?></td>
							<td class="c-align"><?php echo $sGoalieStats->ot;?></td>
							<td class="c-align"><?php echo $sGoalieStats->sa;?></td>
							<td class="c-align"><?php echo $sGoalieStats->ga;?></td>
							<td class="c-align"><?php echo $sGoalieStats->gaa;?></td>
							<td class="c-align"><?php echo $sGoalieStats->sv;?></td>
							<td class="c-align"><?php echo $sGoalieStats->svper;?></td>
							<td class="c-align"><?php echo $sGoalieStats->so;?></td>
							<td class="c-align"><?php echo $sGoalieStats->g;?></td>
							<td class="c-align"><?php echo $sGoalieStats->a;?></td>
							<td class="c-align"><?php echo $sGoalieStats->pim;?></td>
							<td class="c-align"><?php echo $sGoalieStats->toi;?></td>
						</tr>
				<?php } ?>
				</tbody>
			</table><!-- / #statTable -->
		</article>
	</div><!-- / #container -->
	<!-- footer -->
		<?php 
			include 'footer.php'
		?>
	<!-- / footer -->
	<!-- JavaScript link -->
	<script src="js/sortable.js"></script>
</body>
</html>