<!DOCTYPE html>

<html lang="en-US">
<head>
	<title>Error Pump Tycoon 2</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<style>
	#Oil {
		background: white;
		color: green;
		position: absolute;
		left: 50%;
		top:13.5%;
	}
	img {
		height: 500px;
		width: 500px;
	}
	#Container {
		width: 500px;
	}
	#cookies {
		color: green;
	}
	#gameButtons {
		background: rgba(0,0,255,.5);
		color: white;
		position: absolute;
		left: 53%;
		top:30%;
	}
	</style>
</head>

<body>
<?php include "css/navbar.php"?>
	<div id="flexBox">
		<div id="Container">
			<div id="Oil">
				Oil: <span id="cookies">0</span>
			</div> <!-- End Oil -->
			<!-- End Oil, this isnt a joke, oil is kinda a bad resource for fuel and we need a more renewable fuel source -->
			<img src="images/oilPumpTycoon.gif" alt="oilPumpTycoon">
			<div id="gameButtons">
				<button onclick="cookieClick(5)">Pump Oil</button>
				<br/>
				<button onclick="buyCursor()">Hire Workers</button>
				<br/>
				Workers: <span id="cursors">0</span>
				<br/>
				Hire Cost: <span id="cursorCost">10</span>
				<br/>
				<button onclick="buyUpgrades()">Upgrade</button>
				<br/>
				Upgrades: <span id="upgrades">0</span>
				<br/>
				Upgrade Cost: <span id="upgradeCost">1000</span>
				<br/>
				<button onclick="buyTraining()">Efficeiny Training</button>
				<br/>
				Efficientsy trained: <span id="training">0</span>
				<br/>
				Efficentsy Training Cost: <span id="trainingCost">1000</span>
			</div> <!-- End GameButtons -->
			
		</div> <!-- End Container -->
	</div> <!-- End flexBox -->
	<script type="text/javascript" src="js/oilPumpTycoon.js"></script>
</body>
</html>