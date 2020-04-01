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
	<link rel="stylesheet" href="prostyle.css">
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

				$sql = "SELECT id, name, username, email, gender FROM users WHERE username='".$_SESSION["uname"]."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					
					while($row = $result->fetch_assoc()) {
						$eid=$row["id"];
						$ename=$row["name"];
						$eemail=$row["email"];
						$uuname=$row["username"];
						$ugender=$row["gender"];
					}
					
				} else {
					echo "0 results";
				}

				$conn->close();
				
				
			 ?>
			 <div class="vl"></div>
		<form method="post">
		<table>
			<tr>
				<td><b>Name :<br><br></b></td>
				<td><input type="text" name="name" value="<?php echo $ename; ?>"/><br><br></td>
				
			</tr>
			<tr>
				<td><b>Email :<br><br></b></td>
				<td><input type="text" name="email" value="<?php echo $eemail; ?>"/><br><br></td>
				
			</tr>
			
			<tr>
				<td><b>Username :<br><br></b></td>
				<td><input type="text" name="uname" value="<?php echo $uuname; ?>"/><br><br></td>
				
			</tr>
			<tr>
			<td><b>Gender :<br><br></b></td>
			<td><input type="text" name="gender" value="<?php echo $ugender; ?>"/><br><br></td>
			<br><br></td>
			</tr>

			<tr>
				<td align="center" colspan="2"><input type="submit" value="Update" /></td>
				
			</tr>
			
		</table>
		
			
		
	</form>
			
	    </div>
	</div>
	<footer class="footer_container">
				<p>Copyright &copy; Mahedi Hasan, 2020</p>
		</footer>
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
					$sql="UPDATE users SET name='".$_POST["name"]."',email='".$_POST["email"]."',username= '".$_POST["uname"]."',gender='".$_POST["gender"]."' WHERE id='".$eid."'";
					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();
			$_SESSION["uname"]=$_POST["uname"];
			header("Location:profile.php");	
		}
		
		
	?>
</body>
</html>