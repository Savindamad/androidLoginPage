<?php
$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");

$username = $_POST["username"];
$password = $_POST["password"];

$sql_query = "select user_id from user_account where username like '$username' and password like '$password';";
$result = mysqli_query($con,$sql_query);
$num_of_rows = mysqli_num_rows($result);

if($num_of_rows>0){
	$row=mysqli_fetch_assoc($result);

	header('Content-Type: application/json');
	echo json_encode($row);
}
else{
	header('Content-Type: application/json');
	echo json_encode("login fail");
}

?>