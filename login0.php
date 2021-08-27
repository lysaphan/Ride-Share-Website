<?php 
	require 'config.php';

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('https://www.rideshare.hamwebs.com/callback.php', $permissions);

	header("location:" . $loginUrl);
 ?>