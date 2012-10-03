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
		Last Revised: 	20121002
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
		<article role="main" id="content">
			<h1><abbr title="National Hockey League">NHL </abbr>Schedule</h1>
			<form method="POST" action=".">
				
				
				<div id="formwrap">
					<p>
						<label>Season</label>
						<select id="season" name="season">
							<option value="201213" <?php if($sSeason == "201213"){echo 'selected="selected"';}?>>2012-13</option>
							<option value="201112" <?php if($sSeason == "201112"){echo 'selected="selected"';}?>>2011-12</option>
							<option value="201011" <?php if($sSeason == "201011"){echo 'selected="selected"';}?>>2010-11</option>
							
						</select>
					</p>
					<p>
						<label>Game Type</label>
						<select id="gameType" name="gameType">
							<option value="reg" <?php if($sGameType == "reg"){echo 'selected="selected"';}?>>Regular Season</option>
							<option value="post" <?php if($sGameType == "post"){echo 'selected="selected"';}?>>Playoffs</option>
						</select>
					</p>
					<p>
						<label>Team</label>
						<select id="team" name="team">
							<option value="All" <?php if($sTeam == "All"){echo 'selected="selected"';}?>>All Teams</option>
							<option value="ANA" <?php if($sTeam == "ANA"){echo 'selected="selected"';}?>>Anaheim Ducks</option>
							<option value="BOS" <?php if($sTeam == "BOS"){echo 'selected="selected"';}?>>Boston Bruins</option>
							<option value="BUF" <?php if($sTeam == "BUF"){echo 'selected="selected"';}?>>Buffalo Sabres</option>
							<option value="CGY" <?php if($sTeam == "CGY"){echo 'selected="selected"';}?>>Calgary Flames</option>
							<option value="CAR" <?php if($sTeam == "CAR"){echo 'selected="selected"';}?>>Carolina Hurricanes</option>
							<option value="CHI" <?php if($sTeam == "CHI"){echo 'selected="selected"';}?>>Chicago Blackhawks</option>
							<option value="COL" <?php if($sTeam == "COL"){echo 'selected="selected"';}?>>Colorado Avalanche</option>
							<option value="CBJ" <?php if($sTeam == "CBJ"){echo 'selected="selected"';}?>>Columbus Blue Jackets</option>
							<option value="DAL" <?php if($sTeam == "DAL"){echo 'selected="selected"';}?>>Dallas Stars</option>
							<option value="DET" <?php if($sTeam == "DET"){echo 'selected="selected"';}?>>Detroit Red Wings</option>
							<option value="EDM" <?php if($sTeam == "EDM"){echo 'selected="selected"';}?>>Edmonton Oilers</option>
							<option value="FLA" <?php if($sTeam == "FLA"){echo 'selected="selected"';}?>>Florida Panthers</option>
							<option value="LAK" <?php if($sTeam == "LAK"){echo 'selected="selected"';}?>>Los Angeles Kings</option>
							<option value="MIN" <?php if($sTeam == "MIN"){echo 'selected="selected"';}?>>Minnesota Wild</option>
							<option value="MTL" <?php if($sTeam == "MTL"){echo 'selected="selected"';}?>>Montreal Canadiens</option>
							<option value="NSH" <?php if($sTeam == "NSH"){echo 'selected="selected"';}?>>Nashville Predators</option>
							<option value="NJD" <?php if($sTeam == "NJD"){echo 'selected="selected"';}?>>New Jersey Devils</option>
							<option value="NYI" <?php if($sTeam == "NYI"){echo 'selected="selected"';}?>>New York Islanders</option>
							<option value="NYR" <?php if($sTeam == "NYR"){echo 'selected="selected"';}?>>New York Rangers</option>
							<option value="OTT" <?php if($sTeam == "OTT"){echo 'selected="selected"';}?>>Ottawa Senators</option>
							<option value="PHI" <?php if($sTeam == "PHI"){echo 'selected="selected"';}?>>Philadelphia Flyers</option>
							<option value="PHX" <?php if($sTeam == "PHX"){echo 'selected="selected"';}?>>Phoenix Coyotes</option>
							<option value="PIT" <?php if($sTeam == "PIT"){echo 'selected="selected"';}?>>Pittsburgh Penguins</option>
							<option value="SJS" <?php if($sTeam == "SJS"){echo 'selected="selected"';}?>>San Jose Sharks</option>
							<option value="STL" <?php if($sTeam == "STL"){echo 'selected="selected"';}?>>St. Louis Blues</option>
							<option value="TBL" <?php if($sTeam == "TBL"){echo 'selected="selected"';}?>>Tampa Bay Lightning</option>
							<option value="TOR" <?php if($sTeam == "TOR"){echo 'selected="selected"';}?>>Toronto Maple Leafs</option>
							<option value="VAN" <?php if($sTeam == "VAN"){echo 'selected="selected"';}?>>Vancouver Canucks</option>
							<option value="WSH" <?php if($sTeam == "WSH"){echo 'selected="selected"';}?>>Washington Capitals</option>
							<option value="WPG" <?php if($sTeam == "WPG"){echo 'selected="selected"';}?>>Winnipeg Jets</option>
						</select>
					</p>
					<p class="searchbutton">
						<input type='submit' name='action' value='Search' />
					</p>
				</div><!-- / #formwrap -->
			</form>
			<table id="schedTable">
				<caption class="tableCaption">2011-12</caption>
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
				foreach($aTschedule as $sGame) {
				$i++;
					?>
					<tr>
						<td><?php echo $sGame->date;?></td>
						<td><?php echo $sGame->vteam;?></td>
						<td><?php echo $sGame->hteam;?></td>
						<td><?php echo $sGame->time;?></td>
					</tr>
			<?php } ?>
				</tbody>
			</table><!-- / #schedTable -->
		</article>
	</div><!-- / #container -->
	<!-- footer -->
		<?php 
			include 'footer.php'
		?>
	<!-- / footer -->		

</body>
</html>