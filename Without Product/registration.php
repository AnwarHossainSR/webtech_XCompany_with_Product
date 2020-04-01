<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>XCOMPANY</title>
	<link rel="stylesheet" href="regstyle.css">
</head>
<body>
	<div class="header_area">
		<div class="logoarea">
			<h1><span class="x">X</span>Company</h1>
		</div>
		<div class="menu_area">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="registration.php">Registration</a></li>
			</ul>
		</div>
	</div>
	<center>
	<div class="content_area">
		<h3> REGISTRATION</h3>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table>
				<tr>
					<td><b>Name :</b></td>
					<td><input type="text" name="name"/><br><br></td>
				
				</tr>
				<tr>
					<td><b>Email :</b></td>
					<td><input type="email" name="email"/><br><br></td>
				
				</tr>
				<tr>
					<td><b>UserNmae :</b></td>
					<td><input type="text" name="username"/><br><br></td>
				
				</tr>
				<tr>
					<td><b>Password :</b></td>
					<td><input type="password" name="pass"/><br><br></td>
				
				</tr>
				<tr>
					<td><b>Gender :</b></td>
					<td><input type="radio" name="gender" value="male"> Male
					<input type="radio" name="gender" value="female"> Female
					<input type="radio" name="gender" value="other"> Other
					 <br></td>
				</tr>
				<tr>
					<td><b>Date :</b></td>
					<td><input type="date" name="date"/><br><br></td>
				
				</tr>
				<tr>
					<td align="center" colspan="2"><input type="submit" value="Submit" /></td>
				
				</tr>
			
			</table>
		

		
		
		</form>
	</div>
</center>
<br><br><br><br>
	<footer class="footer_container">
				<p>Copyright &copy; Mahedi Hasan, 2020</p>
	</footer>
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
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$sql = "INSERT INTO users (name, email,username,password,gender,date)
		VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["username"]."','".$_POST["pass"]."','".$_POST["gender"]."','".$_POST["date"]."')";

		if ($conn->query($sql) === TRUE) {
			header("location: index.php");
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	

	$conn->close();
?>
</body>
</html>