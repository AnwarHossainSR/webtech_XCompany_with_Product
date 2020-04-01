<?php
	session_start();
	$username=$_SESSION["uname"];
	
	if(!isset($_SESSION["uname"]))
	{
		header("location:index.php");
	}
?>
<?php 

	$id=$_GET["id"];
	$name=$_GET["name"];
	$description=$_GET["description"];
	$quantity=$_GET["quantity"];
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>XCOMPANY</title>
   <link rel="stylesheet" href="addpro.css">
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
				<li><a href="showproducts.php">Products</a></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		<div class="content_right">
			<br><br>
			<div class="vl"></div>
			<h3>Products</h3>
				<form method="post">
		<table>
			<tr>
				<td><b>Product Name :</b></td>
				<td><input type="text" name="pname" value="<?php echo $name; ?>"/></td>
				
			</tr>
			<tr>
				<td><b>Description :</b></td>
				<td><input type="text" name="description" value="<?php echo $description; ?>"/></td>
				
			</tr>
			
			<tr>
				<td><b>Quantity :</b></td>
				<td><input type="number" name="quantity" value="<?php echo $quantity; ?>"/></td>
				
			</tr>
			
			
			<tr>
				<td align="center" colspan="2"><input type="submit" value="Submit" /></td>
				
			</tr>
			
		</table>
		

		
		
	</form>
		    </div>

	</div>
	<footer class="footer_container">

				<p>Copyright &copy; Mahedi Hasan, 2020</p>
		</footer>

</body>
</html>

<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if($_POST["pname"]!="" && $_POST["description"]!="" && $_POST["quantity"]!="")
			{
				
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
					$sql="UPDATE products SET product_name='".$_POST["pname"]."',description='".$_POST["description"]."',quantity= '".$_POST["quantity"]."' WHERE id='".$id."'";
					//$sql = "INSERT INTO products (product_name, description, quantity)
					//VALUES ('".$_POST["pname"]."', '".$_POST["description"]."', '".$_POST["quantity"]."')";

					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();
			}
			header("Location:showproducts.php");	
		}
		
		
	?>