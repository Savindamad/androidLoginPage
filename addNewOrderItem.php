<?php

$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");

header('Content-Type: application/json');

$json = $_POST["order"];

$task_array = json_decode($json,true);
$arraySize = count($task_array);

for($i=0; $i<$arraySize; $i++){
	$item_code = $json[$i]["item_code"];
	$item_qty = $json[$i]["item_qty"];
	$order_id = $json[$i]["order_id"];
	$sql_query = "insert into order_item (item_id,order_no,quantity) values ('$item_code','$order_id','$item_qty');";
	$result = mysqli_query($con,$sql_query);
}

	$json1["success"]='successfully added';
	echo json_encode($json);

?>