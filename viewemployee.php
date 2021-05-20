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
$stmt = $con->prepare('SELECT * FROM EMPLOYEE');
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>View Employee</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Pharmacy Management System</h1>
				<a href="admin.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="addemployee.php"><i class="fas fa-location-arrow"></i>Add Employee</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
		<h2>Employee Details</h2>
			<div>
				<table>
					<tr>

						<th>EMPLOYEE_ID</th>
						<th>EMPLOYEE_NAME</th>
						<th>STORE_ID</th>
						<th>EMPLOYEE_EMAIL</th>
						<th>EMPLOYEE_PHNO</th>
					</tr>
<?php
while($data = $result->fetch_assoc()) {
?>
					<tr>
						<td><?=$data['EMPLOYEE_ID']?></td>
						<td><?=$data['EMPLOYEE_NAME']?></td>
						<td><?=$data['STORE_ID']?></td>
						<td><?=$data['EMPLOYEE_EMAIL']?></td>
						<td><?=$data['EMPLOYEE_PHNO']?></td>
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