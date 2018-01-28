<?php 
include 'includes/db.php';
if ($_POST['customer_id']) {
	$customer_id = $_POST['customer_id']
	$data_fetch = "SELECT * FROM users WHERE id =customer_id";
	$run = mysqli_query($connection, $data_fetch);
	$row = mysqli_fetch_array($run);
	echo json_encode($row);
	// $customer_name = $row['name'];
	// $customer_email = $row['email'];
	// $customer_phone = $row['phone'];
	// $customer_adress = $row['adress'];
	// $customer_country = $row['country'];



}

 ?>