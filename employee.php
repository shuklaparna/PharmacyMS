<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Employee Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Pharmacy Management System</h1>
				<a href="admin.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="addemployee.php"><i class="fas fa-location-arrow"></i>Add Employee</a>
                <a href="viewemployee.php"><i class="fas fa-location-arrow"></i>View Employee</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<!-- <div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div> -->
	</body>
</html>