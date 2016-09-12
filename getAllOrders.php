<?php
$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");

header('Content-Type: application/json');

$json = json_decode(file_get_contents("php://input"), true);
$table_no = $json['table_no'];

$sql_query1 = "select order_no from customer_order where table_no = '$table_no' and status != 3;";

$result1 = mysqli_query($con,$sql_query1);
$num_of_rows = mysqli_num_rows($result1);

$temp_array = array();

if($num_of_rows>0){
	while($row=mysqli_fetch_assoc($result1)){
		$temp_array1 = array();
		$orderNo = $row['order_no'];
		$sql_query2 =  "select * from order_item where order_no = '$orderNo';";
		$result2 = mysqli_query($con,$sql_query2);
		$num_of_rows1 = mysqli_num_rows($result2);
		if($num_of_rows1>0){
			while($row1=mysqli_fetch_assoc($result2)){
				$temp_array1[] = $row1;
			}
			$temp_array[] = $temp_array1;
		}
	}
	echo json_encode(array("orders"=>$temp_array));
}
else{
	echo json_encode(array("orders"=>$"none"));
}


//	echo json_encode(array("order"=>$json);



?>