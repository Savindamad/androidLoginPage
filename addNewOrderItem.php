<?php

$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");

header('Content-Type: application/json');

//$json = $_POST["order"];
//$json = $_GET["order"];
$json = json_decode(file_get_contents("php://input"), true);
$json1 = $json['order'];
$table_no = $json['table_no'];
$user_id = $json['user_id'];

//$json = array(array("order_id"=>"1161","item_code"=>"2","item_qty"=>2),array("order_id"=>"1161","item_code"=>"58","item_qty"=>2),array("order_id"=>"1161","item_code"=>"1","item_qty"=>1));

/*$arr = array(
    array(
        "region" => "valore",
        "price" => "valore2"
    ),
    array(
        "region" => "valore",
        "price" => "valore2"
    ),
    array(
        "region" => "valore",
        "price" => "valore2"
    )
);

*/


$arraySize = count($json1);


for($i=0; $i<$arraySize; $i++){
	$item_code = $json1[$i]["item_code"];
	$item_qty = $json1[$i]["item_qty"];
	$order_id = $json1[$i]["order_id"];
	$sql_query = "insert into order_item (item_id,order_no,quantity) values ('$item_code','$order_id','$item_qty');";
	$result = mysqli_query($con,$sql_query);
}

//$sql_query1 = "select order_no from customer_order where table_no = '$table_no' and accepted != 4;";
$sql_query1 = "select order_no from customer_order where table_no = 5 and accepted != 3;";


$result1 = mysqli_query($con,$sql_query1);
$num_of_rows = mysqli_num_rows($result1);

$temp_array = array();

if($num_of_rows>0){
	$j = 1;
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
			echo json_encode($temp_array1);
			$temp_array["order".$j] = $temp_array1;
		}
		$j++;
	}
}

//	echo json_encode(array("order"=>$json);

echo json_encode(array("orders"=>$temp_array1));


?>