<?php 
	session_start();
	require 'Facebook/autoload.php';
	$fb = new Facebook\Facebook([
	  'app_id' => '395055131516811', 
	  'app_secret' => {app_secret}, 
	  'default_graph_version' => 'v2.11',
	]);

?>
