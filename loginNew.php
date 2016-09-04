<?php
$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");

header('Content-Type: application/json');


$username = $_POST["username"];
$password = $_POST["password"];

$password_en = md5($password);

$sql_query = "select user_id,f_name,l_name,user_type from user_account where username='$username' and password='$password_en';";
$result = mysqli_query($con,$sql_query);
$num_of_rows = mysqli_num_rows($result);

if($num_of_rows>0){
	$row=mysqli_fetch_assoc($result);
	$json["success"]=$row;
	echo json_encode($row);
}
else{
	$json["fail"]='login fail';
	echo json_encode($json);
}

?>