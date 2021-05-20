<?php
// session_start();
// $DATABASE_HOST = 'localhost';
// $DATABASE_USER = 'root';
// $DATABASE_PASS = '';
// $DATABASE_NAME = 'pharmacylogin';
// // Try and connect using the info above.
// $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// if ( mysqli_connect_errno() ) {
// 	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
// }
// $insertion_status = "NONE";
// if (isset($_POST['MEDICINE_NAME'])) {
//     $sql = "INSERT INTO MEDICINE VALUES (NULL, ?, ?, ?, ?, ?, ?)";
// 	if ($stmt = $con->prepare($sql)) {
//         $stmt->bind_param('ssssss', $_POST['MEDICINE_NAME'],$_POST['MANUFACTURER'],$_POST['PRICE'],$_POST['DATE_OF_MANUFACTURE'],$_POST['DATE_OF_EXPIRY'],$_POST['DESCRIPTION'] );
//         $result = $stmt->execute();
//         if ($result) {
//             $insertion_status = "SUCCESS";
//         } else {
//             $insertion_status = "FAIL";
//         }
// 		$stmt->close();
// 	}
// }

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Store</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <nav class="navtop">
			<div>
				<h1>Pharmacy Management System</h1>
				<a href="admin.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="viewstore.php"><i class="fas fa-location-arrow"></i>View Store</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="login">
			<h1>Add Store</h1>
			<form action="addstore.php" method="post">
                <label for="STORE_ADDRESS">Address</label>
                <input type="text" name="STORE_ADDRESS" placeholder="STORE_ADDRESS" id="STORE_ADDRESS" required>
                <label for="STORE_CITY">City</label>
                <input type="text" name="STORE_CITY" placeholder="STORE_CITY" id="STORE_CITY" required>
                <label for="STORE_STATE">State</label>
                <input type="text" name="STORE_STATE" placeholder="STORE_STATE" id="STORE_STATE" required>
                <label for="STORE_EMAIL">Email</label>
                <input type="text" name="STORE_EMAIL" placeholder="STORE_EMAIL" id="STORE_EMAIL" required>
                <label for="STORE_PHNO">Phone</label>
                <input type="text" name="STORE_PHNO" placeholder="STORE_PHNO" id="STORE_PHNO" required>
               
                <input type="submit" value="Submit">
			</form>
        </div>
<?php
//if ($insertion_status == "SUCCESS") {
?>
        <!-- <div>Data added successfully.</div> -->
<?php
//} else if ($insertion_status == "FAIL") {
?>
        <!-- <div>Data addition failed.</div> -->
<?php
//}
?>
	</body>
</html>
