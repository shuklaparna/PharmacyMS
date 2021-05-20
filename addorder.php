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
if (isset($_POST['MED_QUANTITY'])) {
    $sql = "INSERT INTO ORDERS VALUES (NULL, ?, ?, ?, ?, ?)";
    $date = date('Y-m-d');
	if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param('sssss', $_POST['STORE_ID'], $_POST['MEDICINE_ID'], $_POST['CUSTOMER_ID'], $_POST['MED_QUANTITY'], $date);
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

$stmt3 = $con->prepare('SELECT CUSTOMER_ID, CUSTOMER_NAME FROM CUSTOMER');
$stmt3->execute();
$result3 = $stmt3->get_result();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Order</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
        <nav class="navtop">
			<div>
				<h1>Pharmacy Management System</h1>
				<a href="admin.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="vieworder.php"><i class="fas fa-location-arrow"></i>View Order</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="login">
			<h1>Add Order</h1>
			<form action="addorder.php" method="post">
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
                <label for="CUSTOMER_ID">Customer</label>
                <select name="CUSTOMER_ID" placeholder="CUSTOMER_ID" id="CUSTOMER_ID" required>
<?php
while($data = $result3->fetch_assoc()) {
?>
                    <option value="<?=$data['CUSTOMER_ID']?>"><?=$data['CUSTOMER_NAME']?></option>
<?php
}
$stmt3->close();
?>
                </select>
                <label for="MED_QUANTITY">Quantity</label>
                <input type="text" name="MED_QUANTITY" placeholder="MED_QUANTITY" id="MED_QUANTITY" required>
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
