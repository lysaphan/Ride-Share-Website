<?php
$bio = $_POST['bio'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$suburb = $_POST['suburb'];
$city = $_POST['city'];

$lang = $_POST['lang'];

$con = mysqli_connect('mysql.rideshare.hamwebs.com','waikato','@bGYpRSE5@','rideshare_hamwebs');

if (isset($_POST['update'])) {
   
    if(empty($_POST['gender'])){
        $rgender = $_POST['rgender'];
        $query = "UPDATE user_profile SET bio='$bio', phone='$phone', suburb='$suburb', city='$city', gender='$rgender', userlanguage='$lang' where email='$email'";
    } else {
        $gender = $_POST['gender'];
        $query = "UPDATE user_profile SET bio='$bio', phone='$phone', suburb='$suburb', city='$city', gender='$gender', userlanguage='$lang' where email='$email'";
    }
   
    $query_run = mysqli_query($con,$query);

    if($query_run){
        // echo "You have successfully updated your profile.";
        echo "<script> location.href='profile.php?ue=$email'; </script>";
        exit;
    }

}

?>

