<?php
session_start();
if(!isset($_POST['action'])) {
	header('Location: /');
	die();
}
if($_POST['action'] === 'login_user') {
	$array = validate_user_login($_POST);
	echo_ajax_result($array);
}
if($_POST['action'] === 'door_functions' && isset($_SESSION['valid_user'])) {
	$array = get_door_function_array($_POST['button']);
	echo_ajax_result($array);
}
die();

//functions below this line
function echo_ajax_result($array) {
	echo json_encode($array);
	die();
}

function validate_user_login($data) {
	$status = false;
	$user_list = get_user_logins();
	foreach($user_list AS $username => $password) {
		if($username == trim(strtolower($data['username'])) AND $password == trim($data['password'])) {
			$_SESSION['valid_user'] = true;
			$_SESSION['failed_attempts'] = 0;
			$status = true;
			break;
		}
	}
	login_failure_delay($status);
	$array = array(
		'status'	=> $status,
		'url'		=> 'index.php'
	);
	return $array;
}

function login_failure_delay($status) {
	if(!isset($_SESSION['failed_attempts']))
		$_SESSION['failed_attempts'] = 0;
	if(!$status)
		$_SESSION['failed_attempts']++;
	if($_SESSION['failed_attempts'] > 3)
		sleep(2);
	return;
}

function get_user_logins() {
	$array = array(
		'user_name_1' => 'password_1',
		'user_name_2' => 'password_2',
		'user_name_3' => 'password_3'
	);
	return $array;
}

function activate_gpio($array) {
	$status		= true;
	$output_1	= true;
	$output_2	= true;
	$output_3	= true;
	foreach($array as $pin)
		$output_1 = shell_exec("gpio -g mode $pin out");
	foreach($array as $pin)
		$output_2 = shell_exec("gpio -g write $pin 0");
	sleep(1.0);
	foreach($array as $pin)
		$output_3 = shell_exec("gpio -g write $pin 1");
	if($output_1 || $output_2 || $output_3)
		$status = false;
	return $status;
}

function get_door_function_array($button) {
	$array['status'] = true;
	$mdd = [6];		//RPI_PIN > Main Door
	$mdl = [13];	//RPI_PIN > Main Door Light
	$sdd = [19];	//RPI_PIN > Side Door
	$sdl = [26];	//RPI_PIN > Side Door Light
	$add = [6,19];	//All Doors
	$adl = [13,26]; //All Lights
	switch($button) {
		case 'main_door':
			$array['status'] = activate_gpio($mdd);
			$array['message'] = '<h4>Door Error</h4><p>There was a problem activating the main door lift.</p>';
			break;
		case 'main_light':
			$array['status'] = activate_gpio($mdl);
			$array['message'] = '<h4>Light Error</h4><p>There was a problem activating the main door light.</p>';
			break;
		case 'main_lock':
			$array['message'] = '<h4>Lock Error</h4><p>There was a problem activating the main door lock.</p>';
			break;
		case 'side_door':
			$array['status'] = activate_gpio($sdd);
			$array['message'] = '<h4>Door Error</h4><p>There was a problem activating the side door life.</p>';
			break;
		case 'side_light':
			$array['status'] = activate_gpio($sdl);
			$array['message'] = '<h4>Light Error</h4><p>There was a problem activating the side door light.</p>';
			break;
		case 'side_lock':
			$array['message'] = '<h4>Lock Error</h4><p>There was a problem activating the side door lock.</p>';
			break;
		case 'all_door':
			$array['status'] = activate_gpio($add);
			$array['message'] = '<h4>Door Error</h4><p>There was a problem activating the door lifts.</p>';
			break;
		case 'all_light':
			$array['status'] = activate_gpio($adl);
			$array['message'] = '<h4>Light Error</h4><p>There was a problem activating the door lights.</p>';
			break;
		case 'all_lock':
			$array['message'] = '<h4>Lock Error</h4><p>There was a problem activating the door locks.</p>';
			break;
		default:
			$array['message'] = '<h4>Server Error</h4><p>The requested door function was not recognized.</p>';
			$array['status']  = false;
	}
	return $array;
}
?>