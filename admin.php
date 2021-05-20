<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
// $DATABASE_HOST = 'localhost';
// $DATABASE_USER = 'root';
// $DATABASE_PASS = '';
// $DATABASE_NAME = 'pharmacylogin';
// $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// if (mysqli_connect_errno()) {
// 	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
// }
// // We don't have the password or email info stored in sessions so instead we can get the results from the database.
// $stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// // In this case we can use the account ID to get the account info.
// $stmt->bind_param('i', $_SESSION['id']);
// $stmt->execute();
// $stmt->bind_result($password, $email);
// $stmt->fetch();
// $stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Pharmacy Management System</h1>
				<ul>
					<li>
						<a><i class="fas fa-location-arrow"></i>Order</a>
						<ul class="dropdown">
							<li><a href="addorder.php"><i class="fas fa-location-arrow"></i>Add Order</a></li>
							<li><a href="vieworder.php"><i class="fas fa-location-arrow"></i>View Order</a></li>
						</ul>
					</li>
					<li>
						<a><i class="fas fa-location-arrow"></i>Inventory</a>
						<ul class="dropdown">
							<li><a href="addinventory.php"><i class="fas fa-location-arrow"></i>Add Inventory</a></li>
							<li><a href="viewinventory.php"><i class="fas fa-location-arrow"></i>View Inventory</a></li>
						</ul>
					</li>
					<li>
						<a><i class="fas fa-location-arrow"></i>Medicine</a>
						<ul class="dropdown">
							<li><a href="addmedicine.php"><i class="fas fa-location-arrow"></i>Add Medicine</a></li>
							<li><a href="viewmedicine.php"><i class="fas fa-location-arrow"></i>View Medicine</a></li>
						</ul>
					</li>
					<li>
						<a><i class="fas fa-location-arrow"></i>Store</a>
						<ul class="dropdown">
							<li><a href="addstore.php"><i class="fas fa-location-arrow"></i>Add Store</a></li>
							<li><a href="viewstore.php"><i class="fas fa-location-arrow"></i>View Store</a></li>
						</ul>
					</li>
					<li>
						<a><i class="fas fa-location-arrow"></i>Customer</a>
						<ul class="dropdown">
							<li><a href="addcustomer.php"><i class="fas fa-location-arrow"></i>Add Customer</a></li>
							<li><a href="viewcustomer.php"><i class="fas fa-location-arrow"></i>View Customer</a></li>
						</ul>
					</li>
					<li>
						<a><i class="fas fa-location-arrow"></i>Employee</a>
						<ul class="dropdown">
							<li><a href="addemployee.php"><i class="fas fa-location-arrow"></i>Add Employee</a></li>
							<li><a href="viewemployee.php"><i class="fas fa-location-arrow"></i>View Employee</a></li>
						</ul>
					</li>
					<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				</ul>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>