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
				<li><a href="showproducts.php">Products</a></li>
				<li><a href="addproducts.php">Add Products</a></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		<div class="content_right">
			<br><br><br>
			<h3>Products</h3>

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

	$sql = "SELECT id, product_name, description, quantity,category FROM products";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		?>
		<table cellpadding="7px">
			<tr>
				<th>Id</th>
				<th>Product Name</th>
				<th>Description</th>
				<th>Quantity</th>
				<th>Category</th>
				<th>Pd Edit</th>
				<th>Pd Delete</th>
				
				
			</tr>
		<?php
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["product_name"]."</td>";
			echo "<td>".$row["description"]."</td>";
			echo "<td>".$row["quantity"]."</td>";
			echo "<td>".$row["category"]."</td>";
			?>
			<td><a href='editproducts.php?id=<?php echo $row['id']?>'>Edit</a></td>
			<td><a href='deleteproducts.php?id=<?php echo $row['id']?>'>Delete</a></td>
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
	</div>
	<footer class="footer_container">

				<p>Copyright &copy; Mahedi Hasan, 2020</p>
		</footer>
</body>
</html>