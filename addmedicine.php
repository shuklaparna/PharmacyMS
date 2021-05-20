<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'pharmacylogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$insertion_status = "NONE";
if (isset($_POST['MEDICINE_NAME'])) {
    $sql = "INSERT INTO MEDICINE VALUES (NULL, ?, ?, ?, ?, ?, ?)";
	if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param('ssssss', $_POST['MEDICINE_NAME'],$_POST['MANUFACTURER'],$_POST['PRICE'],$_POST['DATE_OF_MANUFACTURE'],$_POST['DATE_OF_EXPIRY'],$_POST['DESCRIPTION'] );
        $result = $stmt->execute();
        if ($result) {
            $insertion_status = "SUCCESS";
        } else {
            $insertion_status = "FAIL";
        }
		$stmt->close();
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Medicine</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <nav class="navtop">
			<div>
				<h1>Pharmacy Management System</h1>
				<a href="admin.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="viewmedicine.php"><i class="fas fa-location-arrow"></i>View Medicine</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="login">
			<h1>Add Medicine</h1>
			<form action="addmedicine.php" method="post">
                <label for="MEDICINE_NAME">Name</label>
                <input type="text" name="MEDICINE_NAME" placeholder="MEDICINE_NAME" id="MEDICINE_NAME" required>
                <label for="MANUFACTURER">Manufacturer</label>
                <input type="text" name="MANUFACTURER" placeholder="MANUFACTURER" id="MANUFACTURER" required>
                <label for="PRICE">Price</label>
                <input type="text" name="PRICE" placeholder="PRICE" id="PRICE" required>
                <label for="DATE_OF_MANUFACTURE">Date of MFG</label>
                <input type="text" name="DATE_OF_MANUFACTURE" placeholder="YYYY-MM-DD" id="DATE_OF_MANUFACTURE" required>
                <label for="DATE_OF_EXPIRY">Expiry</label>
                <input type="text" name="DATE_OF_EXPIRY" placeholder="YYYY-MM-DD" id="DATE_OF_EXPIRY" required>
                <label for="DESCRIPTION">Description</label>
                <input type="text" name="DESCRIPTION" placeholder="DESCRIPTION" id="DESCRIPTION" required>
                <input type="submit" value="Submit">
			</form>
        </div>
<?php
if ($insertion_status == "SUCCESS") {
?>
        <div>Data added successfully.</div>
<?php
} else if ($insertion_status == "FAIL") {
?>
        <div>Data addition failed.</div>
<?php
}
?>
	</body>
</html>
