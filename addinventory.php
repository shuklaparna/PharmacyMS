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
if (isset($_POST['STORE_ID'])) {
	$sql = "SELECT * FROM INVENTORY WHERE STORE_ID = ? AND MEDICINE_ID = ?";
	if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param('ss', $_POST['STORE_ID'], $_POST['MEDICINE_ID']);
		$result = $stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows == 0) {
			$sql = "INSERT INTO INVENTORY VALUES (?, ?, 0)";
			if ($stmt2 = $con->prepare($sql)) {
				$stmt2->bind_param('ss', $_POST['STORE_ID'], $_POST['MEDICINE_ID']);
				$stmt2->execute();
				$stmt2->close();
			}
		}
		$stmt->close();
	}
    $sql = "UPDATE INVENTORY SET QUANTITY=? WHERE STORE_ID = ? AND MEDICINE_ID = ?";
	if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param('sss', $_POST['QUANTITY'], $_POST['STORE_ID'], $_POST['MEDICINE_ID']);
        $result = $stmt->execute();
        if ($result) {
            $insertion_status = "SUCCESS";
        } else {
            $insertion_status = "FAIL";
        }
		$stmt->close();
	}
}

$stmt1 = $con->prepare('SELECT STORE_ID FROM STORE');
$stmt1->execute();
$result1 = $stmt1->get_result();

$stmt2 = $con->prepare('SELECT MEDICINE_ID, MEDICINE_NAME FROM MEDICINE');
$stmt2->execute();
$result2 = $stmt2->get_result();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Inventory</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <nav class="navtop">
			<div>
				<h1>Pharmacy Management System</h1>
				<a href="admin.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="viewinventory.php"><i class="fas fa-location-arrow"></i>View Inventory</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="login">
			<h1>Add Inventory</h1>
			<form action="addinventory.php" method="post">
				<label for="STORE_ID">Store Id</label>
                <select name="STORE_ID" placeholder="STORE_ID" id="STORE_ID" required>
<?php
while($data = $result1->fetch_assoc()) {
?>
                    <option value="<?=$data['STORE_ID']?>"><?=$data['STORE_ID']?></option>
<?php
}
$stmt1->close();
?>
                </select>
                <label for="MEDICINE_ID">Medicine</label>
                <select name="MEDICINE_ID" placeholder="MEDICINE_ID" id="MEDICINE_ID" required>
<?php
while($data = $result2->fetch_assoc()) {
?>
                    <option value="<?=$data['MEDICINE_ID']?>"><?=$data['MEDICINE_NAME']?></option>
<?php
}
$stmt2->close();
?>
                </select>
                <label for="QUANITY">Quantity</label>
                <input type="number" name="QUANTITY" placeholder="QUANTITY" id="QUANTITY" required>
               
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
