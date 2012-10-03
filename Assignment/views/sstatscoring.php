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
		<article role="main" class="main">
			<h1><abbr title="National Hockey League">NHL </abbr>Player Statistics</h1>
			<form method="POST" action=".">
				<div id="formwrap">
					<p>
						<label>Season</label>
						<select id="season" name="season">
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
						<label>Scoring View</label>
						<select id="statview" name="statView">
							<option value="sstatscoring" <?php if($sStatView == "sstatscoring"){echo 'selected="selected"';}?>>Standard</option>
							<option value="sstaticetime" <?php if($sStatView == "sstaticetime"){echo 'selected="selected"';}?>>Ice Time Splits</option>
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
					<p>
						<label>Position</label>
						<select id="position" name="position">
							<option value="s" <?php if($sPposition == "s"){echo 'selected="selected"';}?>>All Skaters</option>
							<option value="f" <?php if($sPposition == "f"){echo 'selected="selected"';}?>>Forwards</option>
							<option value="d" <?php if($sPposition == "d"){echo 'selected="selected"';}?>>Defenseman</option>
							<option value="g" <?php if($sPposition == "g"){echo 'selected="selected"';}?>>Goalies</option>
						</select>
					</p>
					<p>
						<label>Player Status</label>
						<select id="playerstatus" name="playerStatus">
							<option value="All" <?php if($sPlayerStatus == "All"){echo 'selected="selected"';}?>>All Players</option>
							<option value="Rookie" <?php if($sPlayerStatus == "Rookie"){echo 'selected="selected"';}?>>Rookies</option>
						</select>
					</p>
					<p class="searchbutton">
						<input type='submit' name='action' value='Search' />
					</p>
				</div><!-- / #formwrap -->
			</form>
			<table class="sortable">
				<caption class="tableCaption"><?php echo substr($sSeason, 0, 4) . "-" . substr($sSeason, 4, 2)?> Skater Statistics</caption>
				<thead>
					<tr>
						<th scope="col" class="cbase"></th>
						<th scope="col" class="cbase name">Name</th>
						<th scope="col" class="cbase">Age</th>
						<th scope="col" class="cbase">Team</th>
						<th scope="col" class="cbase">Pos</th>
						<th scope="col" class="cbase">GP</th>
						<th scope="col" class="cbase">G</th>
						<th scope="col" class="cbase">A</th>
						<th scope="col" class="cbase">Pts</th>
						<th scope="col" class="cbp1">+/-</th>
						<th scope="col" class="cbp1">PIM</th>
						<th scope="col" class="cbp1">PPG</th>
						<th scope="col" class="cbp1">SHG</th>
						<th scope="col" class="cbp1">GWG</th>
						<th scope="col" class="cbp2">SOG</th>
						<th scope="col" class="cbp2">S%</th>
						<th scope="col" class="cbp2">TOI/G</th>
						<th scope="col" class="cbp2">PP TOI/G</th>
						<th scope="col" class="cbp2">SH TOI/G</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i=0;
					foreach($aData as $sSktrStats){
					$i++;
						?>
						<tr>
							<td class="cbase"><?php echo $i;?></td>
							<td class="cbase name"><?php echo $sSktrStats->name;?></td>
							<td class="cbase"><?php echo $sSktrStats->age;?></td>
							<td class="cbase"><?php echo $sSktrStats->teamcur;?></td>
							<td class="cbase"><?php echo $sSktrStats->pos;?></td>
							<td class="cbase"><?php echo $sSktrStats->gp;?></td>
							<td class="cbase"><?php echo $sSktrStats->g;?></td>
							<td class="cbase"><?php echo $sSktrStats->a;?></td>
							<td class="cbase"><?php echo $sSktrStats->pts;?></td>
							<td class="cbp1"><?php echo $sSktrStats->plusminus;?></td>
							<td class="cbp1"><?php echo $sSktrStats->pim;?></td>
							<td class="cbp1"><?php echo $sSktrStats->ppg;?></td>
							<td class="cbp1"><?php echo $sSktrStats->shg;?></td>
							<td class="cbp1"><?php echo $sSktrStats->gwg;?></td>
							<td class="cbp2"><?php echo $sSktrStats->sog;?></td>
							<td class="cbp2"><?php echo $sSktrStats->shtpct;?></td>
							<td class="cbp2"><?php echo $sSktrStats->toiperg;?></td>
							<td class="cbp2"><?php echo $sSktrStats->pptoiperg;?></td>
							<td class="cbp2"><?php echo $sSktrStats->shtoiperg;?></td>
						</tr>
				<?php } ?>
				</tbody>
				
			</table><!-- / #statTable -->
			<div id="pagination">
				<p class="searchbutton">
					<input type='submit' name='action' value='Previous' />
				</p>
				<p class="searchbutton">
					<input type='submit' name='action' value='Next' />
				</p>
				<p class="searchbutton">
					<input type='submit' name='action' value='All' />
				</p>
			</div>
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