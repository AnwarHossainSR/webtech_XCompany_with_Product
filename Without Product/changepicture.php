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
		<link rel="stylesheet" href="cpstyle.css">
</head>
<body>
	<div class="header_area">
		<div class="logoarea">
			<h1><span class="x">X</span>Company</h1>
		</div>
		<div class="menu_area">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>Logged in as <a style="color:red;" href="profile.php"><?php echo $username; ?></a></li>
				<li><a href="logout.php">Logout</a></li>
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
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		<div class="content_right">
			<br><br><br><br>
			<div class="vl"></div>
			<div class="content_right_l">
				<h3>Profile Picture</h3>
				
				<form action="upload.php" method="post" enctype="multipart/form-data">
					Select image to upload:<br><br>
					<input type="file" name="fileToUpload" id="fileToUpload"><br><br>
					<input type="submit" value="Upload Image" name="submit">
				</form>
				
		</div>
	</div>
	<footer class="footer_container">
				<p>Copyright &copy; Mahedi Hasan, 2020</p>
	</footer>
</body>
</html>