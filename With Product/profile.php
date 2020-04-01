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
	<link rel="stylesheet" href="profilestyle.css">
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
				<h3>Profile</h3>
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "xdb";
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT id, name, username, email,password,gender,date,picture FROM users WHERE username='".$_SESSION["uname"]."'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						echo "<table>";
						while($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>Id :</td>";
							echo "<td>".$row["id"]."</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<td>Name :</td>";
							echo "<td>".$row["name"]."</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<td>Email :</td>";
							echo "<td>".$row["email"]."</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<td>Username :</td>";
							echo "<td>".$row["username"]."</td>";
							echo "</tr>";

							echo "<tr>";
							echo "<td>Gender :</td>";
							echo "<td>".$row["gender"]."</td>";
							echo "</tr>";

							echo "<tr>";
							echo "<td>Reg Date :</td>";
							echo "<td>".$row["date"]."</td>";
							echo "</tr>";

							echo "<tr>";
							echo "<td>Picture :</td>";
							?>
							<td><img src="<?php echo $row["picture"]; ?>" height="100px"/></td>
							<?php
							echo "</tr>";

						}
						echo "</table>";
					} else {
						echo "0 results";
					}

					$conn->close();
					
					
				 ?>
			</div>
			<div class="content_right_r">
			
			</div>
		</div>
	</div>
	<footer class="footer_container">
				<p>Copyright &copy; Mahedi Hasan, 2020</p>
		</footer>
</body>
</html>