<?php
	session_start();
?>
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

		if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
		   
		  
		  $sql = "SELECT * FROM users WHERE username = '".$_POST["uname"]."' and password = '".$_POST["pass"]."'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0)
		  {
			  $_SESSION["uname"]=$_POST["uname"];
			  header("location: dashboard.php");
		  }
			  
		  else
			  echo "wrong email or password";
   }
	?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>XCOMPANY</title>
		<link rel="stylesheet" href="loginstyle.css">
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
	<div class="content_area2">
		<h1>LOGIN</h1>
		<form method="post">
			<table>
				
				<tr>
					<td><b>Username :</b></td>
					<td><input type="text" name="uname"/></td>
					
				</tr>
				
				<tr>
					<td><b>Password :</b></td>
					<td><input type="password" name="pass"/></td>
					
				</tr>
				

				<tr>
					<td align="center" colspan="2"><input type="submit" value="Login" /></td>
					
				</tr>
				
			</table>

		
		</form>
	
	</div>
	</center>
	<footer class="footer_container">
				<p>Copyright &copy; Mahedi Hasan, 2020</p>
	</footer>
	
</body>
</html>