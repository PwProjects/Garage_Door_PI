<?php
session_start();
if(!isset($_SESSION['valid_user']))
	header('Location: login.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Garage Door</title>
		<meta name="google" value="notranslate">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Garage Door Utility">
		<meta name="theme-color" content="#4286f4">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" defer></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js" defer></script>
		<script src="includes/gdoor.js" defer></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
		<link rel="stylesheet" href="includes/gdoor.css">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">
	</head>
	<body style="visibility:hidden">
		<script type="text/javascript">
		</script>
		<div id="main_page" class="container" data-role="page" data-title="Garage Door">
			<div data-role="header" data-position="fixed">
				<h1>
					<form id="logout_form" action="login.php" method="post" data-ajax="false">
						<input type="hidden" name="logout" value="true">
						<button id="sign_out" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-carat-l ui-btn-icon-notext">Sign Out</button>
					</form>
				</h1>
			</div>
			<div data-role="content" class="ui-body ui-body-a">
				<div data-role="collapsibleset" data-theme="a" data-content-theme="a">
					<div id="double-door" data-role="collapsible" data-collapsed="false" >
						<h3>Main Door</h3>
						<button id="main_door" class="door_func ui-btn ui-icon-home ui-btn-icon-left ui-corner-all ui-shadow">Door</button>
						<button id="main_light" class="door_func ui-btn ui-icon-power ui-btn-icon-left ui-corner-all ui-shadow">Light</button>
						<button id="main_lock" class="door_func ui-btn ui-icon-lock ui-btn-icon-left ui-corner-all ui-shadow">Lock</button>
					</div>
					<div id="single-door" data-role="collapsible">
						<h3>Side Door</h3>
						<button id="side_door" class="door_func ui-btn ui-icon-home ui-btn-icon-left ui-corner-all ui-shadow">Door</button>
						<button id="side_light" class="door_func ui-btn ui-icon-power ui-btn-icon-left ui-corner-all ui-shadow">Light</button>
						<button id="side_lock" class="door_func ui-btn ui-icon-lock ui-btn-icon-left ui-corner-all ui-shadow">Lock</button>
					</div>
					<div id="both-doors" data-role="collapsible">
						<h3>All Doors</h3>
						<button id="all_door" class="door_func ui-btn ui-icon-home ui-btn-icon-left ui-corner-all ui-shadow">Door</button>
						<button id="all_light" class="door_func ui-btn ui-icon-power ui-btn-icon-left ui-corner-all ui-shadow">Light</button>
						<button id="all_lock" class="door_func ui-btn ui-icon-lock ui-btn-icon-left ui-corner-all ui-shadow">Lock</button>
					</div>
				</div>
			</div>
			<div id="popup" data-role="popup" class="ui-content" data-theme="a"></div>
			<div data-role="footer" data-position="fixed"></div>
		</div>
	</body>
</html>