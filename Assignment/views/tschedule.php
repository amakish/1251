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
							<option value="Anaheim" <?php if($sTeam == "Anaheim"){echo 'selected="selected"';}?>>Anaheim Ducks</option>
							<option value="Boston" <?php if($sTeam == "Boston"){echo 'selected="selected"';}?>>Boston Bruins</option>
							<option value="Buffalo" <?php if($sTeam == "Buffalo"){echo 'selected="selected"';}?>>Buffalo Sabres</option>
							<option value="Calgary" <?php if($sTeam == "Calgary"){echo 'selected="selected"';}?>>Calgary Flames</option>
							<option value="Carolina" <?php if($sTeam == "Carolina"){echo 'selected="selected"';}?>>Carolina Hurricanes</option>
							<option value="Chicago" <?php if($sTeam == "Chicago"){echo 'selected="selected"';}?>>Chicago Blackhawks</option>
							<option value="Colorado" <?php if($sTeam == "Colorado"){echo 'selected="selected"';}?>>Colorado Avalanche</option>
							<option value="Columbus" <?php if($sTeam == "Columbus"){echo 'selected="selected"';}?>>Columbus Blue Jackets</option>
							<option value="Dallas" <?php if($sTeam == "Dallas"){echo 'selected="selected"';}?>>Dallas Stars</option>
							<option value="Detroit" <?php if($sTeam == "Detroit"){echo 'selected="selected"';}?>>Detroit Red Wings</option>
							<option value="Edmonton" <?php if($sTeam == "Edmonton"){echo 'selected="selected"';}?>>Edmonton Oilers</option>
							<option value="Florida" <?php if($sTeam == "Florida"){echo 'selected="selected"';}?>>Florida Panthers</option>
							<option value="Los Angeles" <?php if($sTeam == "Los Angeles"){echo 'selected="selected"';}?>>Los Angeles Kings</option>
							<option value="Minnesota" <?php if($sTeam == "Minnesota"){echo 'selected="selected"';}?>>Minnesota Wild</option>
							<option value="Montreal" <?php if($sTeam == "Montreal"){echo 'selected="selected"';}?>>Montreal Canadiens</option>
							<option value="Nashville" <?php if($sTeam == "Nashville"){echo 'selected="selected"';}?>>Nashville Predators</option>
							<option value="New Jersey" <?php if($sTeam == "New Jersey"){echo 'selected="selected"';}?>>New Jersey Devils</option>
							<option value="NY Islanders" <?php if($sTeam == "NY Islanders"){echo 'selected="selected"';}?>>New York Islanders</option>
							<option value="NY Rangers" <?php if($sTeam == "NY Rangers"){echo 'selected="selected"';}?>>New York Rangers</option>
							<option value="Ottawa" <?php if($sTeam == "Ottawa"){echo 'selected="selected"';}?>>Ottawa Senators</option>
							<option value="Philadelphia" <?php if($sTeam == "Philadelphia"){echo 'selected="selected"';}?>>Philadelphia Flyers</option>
							<option value="Phoenix" <?php if($sTeam == "Phoenix"){echo 'selected="selected"';}?>>Phoenix Coyotes</option>
							<option value="Pittsburgh" <?php if($sTeam == "Pittsburgh"){echo 'selected="selected"';}?>>Pittsburgh Penguins</option>
							<option value="San Jose" <?php if($sTeam == "San Jose"){echo 'selected="selected"';}?>>San Jose Sharks</option>
							<option value="St. Louis" <?php if($sTeam == "St. Louis"){echo 'selected="selected"';}?>>St. Louis Blues</option>
							<option value="Tampa Bay" <?php if($sTeam == "Tampa Bay"){echo 'selected="selected"';}?>>Tampa Bay Lightning</option>
							<option value="Toronto" <?php if($sTeam == "Toronto"){echo 'selected="selected"';}?>>Toronto Maple Leafs</option>
							<option value="Vancouver" <?php if($sTeam == "Vancouver"){echo 'selected="selected"';}?>>Vancouver Canucks</option>
							<option value="Washington" <?php if($sTeam == "Washington"){echo 'selected="selected"';}?>>Washington Capitals</option>
							<option value="Winnipeg" <?php if($sTeam == "Winnipeg"){echo 'selected="selected"';}?>>Winnipeg Jets</option>
						</select>
					</p>
					<p class="searchbutton">
						<input type='submit' name='action' value='Search' />
					</p>
				</div><!-- / #formwrap -->
			</form>
			<table id="schedTable">
				<thead>
					<h1 class="tableCaption"><?php echo substr($sSeason, 0, 4) . "-" . substr($sSeason, 4, 2)?> Schedule</h1>
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
				foreach($aData as $sGame) {
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