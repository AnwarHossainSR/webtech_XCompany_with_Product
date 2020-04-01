<?php
	session_start();
	$username=$_SESSION["uname"];
	
	if(!isset($_SESSION["uname"]))
	{
		header("location:index.php");
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>XCOMPANY</title>
   <link rel="stylesheet" href="dashstyle.css">
</head>
<body>
	<div class="header_area">
		<div class="logoarea">
			<h1><span class="x">X</span>Company</h1>
		</div>
		<div class="menu_area">
			<ul>
				<li>Logged in as <a style="color:#0c0b0b;" href=" profile.php"><b><?php echo $username; ?></a></li>
			</ul>
		</div>
	</div>
	<div class="content_area">
		<div class="content_left">
			<h3>Account</h3>
			<hr class="hr">
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profile.php">View Profile</a></li>
				<li><a href="editprofile.php">Edit Profile</a></li>
				<li><a href="changepicture.php">Change Profile Picture</a></li>
				<li><a href="changepassword.php">Change Password</a></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		<div class="content_right">
			<br><br><br><br>
			<div class="vl"></div>
			<div class="welcome">
			<h2>Welcome <?php echo $username; ?></h2>
		    </div>
			
		</div>
	</div>
	<footer class="footer_container">

				<p>Copyright &copy; Mahedi Hasan, 2020</p>
		</footer>
</body>
</html>