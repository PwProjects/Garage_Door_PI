<?php
session_start();
if(isset($_POST['logout']))
	unset($_POST, $_SESSION['valid_user']);
if(isset($_SESSION['valid_user']))
	header('Location: index.php');
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
		<div id="login_page" class="container" data-role="page" data-title="Garage Door">
			<div data-role="header" data-position="fixed">
				<h1>
					<a href="#information" data-transition="slideup" id="popup_info" data-rel="popup" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-info ui-btn-icon-notext">Information</a>
				</h1>
			</div>
			<div data-role="content" class="ui-body ui-body-a">
				<div id="login_header" class="ui-bar login-bar ui-corner-all">
					<h3 id="login_text" class="ui-icon-lock ui-btn-icon-right">Sign In</h3>
				</div>
				<form method="post">
					<label for="username" class="ui-hidden-accessible">Username:</label>
					<input id="username" type="text" name="username" value="" placeholder="username" data-clear-btn="true">
					<label for="password" class="ui-hidden-accessible">Password:</label>
					<input id="password" type="password" type="text" name="password" placeholder="password" data-clear-btn="true">
					<label for="remember" class="checkbox">Remember Me</label>
					<input type="checkbox" value="remember" id="remember" data-mini="true">
					<button id="submit" type="button" class="ui-btn ui-corner-all ui-shadow">Submit</button>
				</form>
			</div>
			<div id="information" data-role="popup" data-dismissible="false" class="ui-content" data-theme="a">
				<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-left">Close</a>
				<h4>Welcome to Real.. Fake... Garage Doors!</h4>
				<img src="includes/bground.png">
			</div>
			<div data-role="footer" data-position="fixed"></div>
		</div>
	</body>
</html>