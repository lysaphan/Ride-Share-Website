<?php 

	require 'config.php';
	$helper = $fb->getRedirectLoginHelper();

	try {

	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	if (! isset($accessToken)) {
	  if ($helper->getError()) {
	    header('HTTP/1.0 401 Unauthorized');
	    echo "Error: " . $helper->getError() . "\n";
	    echo "Error Code: " . $helper->getErrorCode() . "\n";
	    echo "Error Reason: " . $helper->getErrorReason() . "\n";
	    echo "Error Description: " . $helper->getErrorDescription() . "\n";
	  } else {
	    header('HTTP/1.0 400 Bad Request');
	    echo 'Bad request';
	  }
	  exit;
	}


	// Logged in
	 $_SESSION['fb_access'] = $accessToken->getValue();



try {
	  // Returns a `Facebook\FacebookResponse` object
	  $responseUser = $fb->get('/me?fields=id,name,email,cover,gender,picture,link', $_SESSION['fb_access']);

	  $responseImage = $fb->get('/me/picture?redirect=false&width=250&height=250', $_SESSION['fb_access']);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	$user = $responseUser->getGraphUser();

	$image = $responseImage->getGraphUser();


       $user_name = $user['name'];

 $user_email = $user['email'];

 $_SESSION['ue'] = $user_email ;
 $_SESSION['user_email'] = $user_email;

 $user_photo = $image['url'];


 $con = mysqli_connect('mysql.rideshare.hamwebs.com','waikato','@bGYpRSE5@','rideshare_hamwebs'); 
if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
 }

 $sql = "INSERT INTO user_profile (name, photo, email)
     VALUES ('$user_name', '$user_photo','$user_email');";

mysqli_query($con,$sql);

	 header("location: profile.php?ue=".$user_email)

 ?>