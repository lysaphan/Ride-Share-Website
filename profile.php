
<?php 
session_start();
$con = mysqli_connect('mysql.rideshare.hamwebs.com','waikato','@bGYpRSE5@','rideshare_hamwebs');

$getemail = $_GET['ue'];
//var_dump($getemail);
$sql = "SELECT * FROM user_profile where email='$getemail'";

$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel= "stylesheet" type="text/css" href="profile.css?">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container emp-profile">
    <form method="post">
        <?php while($row = mysqli_fetch_array($result)){  ?>
    <div class="row">
        <!-- Col 1 -->
        <div class="col-6 col-md-4" style="text-align:center">
            <div class="profile-img">
                <?php echo "<img src=" . $row['photo'] . ">"; ?>
            </div>
            <div class="profile-head">
                    <h5><?php echo $row['name']; ?></h5>
                    <h6><?php echo $row['bio']; ?></h6>
                <span class="fa fa-star " style="font-size:36px"></span>
                <span class="fa fa-star " style="font-size:36px"></span>
                <span class="fa fa-star " style="font-size:36px"></span>
                <span class="fa fa-star " style="font-size:36px"></span>
                <span class="fa fa-star" style="font-size:36px"></span>
                <h4>
                    0 Trips
                </h4>
            </div>
        </div>

    <!-- Col 2 -->
    <div class="col-12 col-md-8">
         <nav class="side-menu">
                    <ul class="nav">
                        <li class="active"><a href="http://localhost//profile.php"><span class="fa fa-user"></span> Profile</a></li>
                        <li><a href="#"><span class="fa fa-envelope"></span> Messages</a></li>
                        <li><a href="#"><span class="fa fa-th"></span> Trips</a></li>
                    </ul>
            </nav>
        <div class="col-md-10 offset-md-1" style="margin-top: 50px">
            <div class="row">
                <div class="col-md-5">
                    <label>Email</label>
                </div>
                <div class="col-md-7">
                    <p><?php echo $row['email']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Phone Number</label>
                </div>
                <div class="col-md-7">
                    <p><?php echo $row['phone']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Suburb</label>
                </div>
                <div class="col-md-7">
                    <p><?php echo $row['suburb']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>City</label>
                </div>
                <div class="col-md-7">
                    <p><?php echo $row['city']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Gender</label>
                </div>
                <div class="col-md-7">
                    <p><?php echo $row['gender']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label>Language</label>
                </div>
                <div class="col-md-7">
                    <p><?php echo $row['userlanguage']; ?></p>
                </div>
            </div>
            <button type="button" class="profile-edit-btn" onclick="window.location.href='editprofile.php';">Edit Profile</button>
        </div>
        
    </div>
    <?php }  ?>
    </form>           
</div>
	 <script>$(function() {
        $('profile-edit-btn').click(function(event) {
        localStorage.setItem("text", "profile-edit-btn");
        });

        var path = window.location.pathname;
        var pathSub = path.substring(path.lastIndexOf("/") + 1, path.length)

        if(pathSub == "editprofile.php"){
            document.getElementById(localStorage.getItem('text')).click();
        }
    }) </script>
</body>
</html>


