<?php
	$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");
	header('Content-Type: application/json');

	//$sql_query= "select max("order_no") as ("primary key") from ("customer_order");";
	//$sql_query = "SELECT * from customer_order ORDER BY order_no DESC LIMIT 1;";
	$sql_query = "SELECT * FROM customer_order WHERE order_no = (SELECT MAX(order_no) FROM customer_order);";
	//$sql_query = "select * from menu_item; ";
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