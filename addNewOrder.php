<?php
	$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");
	header('Content-Type: application/json');

	//$sql_query= "select max("order_no") as ("primary key") from ("customer_order");";
	//$sql_query = "SELECT * from customer_order ORDER BY order_no DESC LIMIT 0,1;";

	//$sql_query = "select max(order_no) from customer_order;";
	$sql_query = "SELECT MAX(order_no) FROM customer_order;";// SELECT LAST_INSERT_ID();";
	//$sql_query = "select * from customer_order; ";

	$temp_array = array();

	$result = mysqli_query($con,$sql_query);
    $num_of_rows = mysqli_num_rows($result);

    if($num_of_rows>0){
		while($row=mysqli_fetch_assoc($result)){
		$temp_array[] = $row;
		}
	}
echo json_encode(array("menu_items"=>$temp_array));
?>