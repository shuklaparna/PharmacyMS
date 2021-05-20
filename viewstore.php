<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'pharmacylogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT * FROM STORE');
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>View Store</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Pharmacy Management System</h1>
				<a href="admin.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="addstore.php"><i class="fas fa-location-arrow"></i>Add Store</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Store Details</h2>
			<div>
				<table>
					<tr>
						<th>STORE_ID</th>
						<th>STORE_ADDRESS</th>
						<th>STORE_CITY</th>
						<th>STORE_STATE</th>
						<th>STORE_EMAIL</th>
						<th>STORE_PHNO</th>
					</tr>
<?php
while($data = $result->fetch_assoc()) {
?>
					<tr>
						<td><?=$data['STORE_ID']?></td>
						<td><?=$data['STORE_ADDRESS']?></td>
						<td><?=$data['STORE_CITY']?></td>
						<td><?=$data['STORE_STATE']?></td>
						<td><?=$data['STORE_EMAIL']?></td>
						<td><?=$data['STORE_PHNO']?></td>
					</tr>
<?php
}
$stmt->close();
?>
				</table>
			</div>
		</div>
	</body>
</html>