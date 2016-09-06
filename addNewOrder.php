<?php
	$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");
	header('Content-Type: application/json');

	$user_id = $_POST["userId"];
	$table_no = $_POST["tableNum"];

	$sql_query = "insert into customer_order (table_no,ordered_by,accepted) values ('$table_no','$user_id',0);";
	$sql_query1 = "select * from customer_order where order_no=(select MAX(order_no) from customer_order);";


	$result = mysqli_query($con,$sql_query);
	$result1 = mysqli_query($con,$sql_query1);

    $num_of_rows = mysqli_num_rows($result1);

    if($num_of_rows>0){
    	$row=mysqli_fetch_assoc($result1);
    	$json["result"]=$row;
    	echo json_encode($row);
	}
	else{
		$json["error"]='Can not access database';
        echo json_encode($json);
	}
echo json_encode(array("menu_items"=>$temp_array));
?>