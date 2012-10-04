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
							<option value="sstatscoring" <?php if($sView == "sstatscoring"){echo 'selected="selected"';}?>>Standard</option>
							<option value="sstaticetime" <?php if($sView == "sstaticetime"){echo 'selected="selected"';}?>>Ice Time Splits</option>
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
					<form class="thead" action='.' method="post">
						<tr>
							<input type='submit' name='action' scope="col" value='' />
							<input type='submit' name='action' scope="col" value='Name' />
							<input type='submit' name='action' scope="col" value='Age' />
							<input type='submit' name='action' scope="col" value='Team' />
							<input type='submit' name='action' scope="col" value='Pos' />
							<input type='submit' name='action' scope="col" value='GP' />
							<input type='submit' name='action' scope="col" value='G' />
							<input type='submit' name='action' scope="col" value='A' />
							<input type='submit' name='action' scope="col" value='Pts' />
							<input type='submit' name='action' scope="col" value='+/-' />
							<input type='submit' name='action' scope="col" value='PIM' />
							<input type='submit' name='action' scope="col" value='PPG' />
							<input type='submit' name='action' scope="col" value='SHG' />
							<input type='submit' name='action' scope="col" value='GWG' />
							<input type='submit' name='action' scope="col" value='SOG' />
							<input type='submit' name='action' scope="col" value='S%' />
							<input type='submit' name='action' scope="col" value='TOI/G' />
							<input type='submit' name='action' scope="col" value='PP TOI/G' />
							<input type='submit' name='action' scope="col" value='SH TOI/G' />
						</tr>
					</form>
				</thead>
				<tbody>
					<?php 
					$i=0;
					foreach($aData as $sSktrStats){
					$i++;
						?>
						<tr>
							<td><?php echo $iStartPage++;?></td>
							<td><?php echo $sSktrStats->name;?></td>
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
							<td><?php echo $sSktrStats->sog;?></td>
							<td><?php echo $sSktrStats->shtpct;?></td>
							<td><?php echo $sSktrStats->toiperg;?></td>
							<td><?php echo $sSktrStats->pptoiperg;?></td>
							<td><?php echo $sSktrStats->shtoiperg;?></td>
						</tr>
				<?php } ?>
				</tbody>
				
			</table><!-- / #statTable -->
			<form id="pagination" action='.' method="post">
				<p class="searchbutton">
					<input type='submit' name='action' value='Previous' />
				</p>
				<p class="searchbutton">
					<input type='submit' name='action' value='Next' />
				</p>
				<p class="searchbutton">
					<input type='submit' name='action' value='All' />
				</p>
			</form><!-- / #pagination -->
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