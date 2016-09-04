<?php
	$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");
	header('Content-Type: application/json');

	$sql_query= "SELECT MAX("order_no") AS ("primary key") FROM ("customer_order");";

	$result = mysqli_query($con,$sql_query);
	$num_of_rows = mysqli_num_rows($result);
	if($num_of_rows>0){
		$row=mysqli_fetch_assoc($result);
		echo $row;
	}
	else{
		echo "error";
	}
?>