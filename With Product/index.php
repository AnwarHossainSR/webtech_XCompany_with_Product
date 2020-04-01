<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>XCOMPANY</title>
	<link rel="stylesheet" href="regstyle.css">
</head>
<body>
	<div class="header_area" >
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
	<div class="content_area2">
		<br><br>
		<h1>Welcome to Our Company</h1>
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
		<table>
			<tr>
				<th>Id</th>
				<th>Product Name</th>
				<th>Description</th>
				<th>Quantity</th>
				<th>Category</th>
				
				
			</tr>
		<?php
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["product_name"]."</td>";
			echo "<td>".$row["description"]."</td>";
			echo "<td>".$row["quantity"]."</td>";
			echo "<td>".$row["category"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}

	$conn->close();
?>
	</div>
		<footer class="footer_container">
				<p>Copyright &copy; Mahedi Hasan, 2020</p>
		</footer>
</body>
</html>