<?php

$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");

header('Content-Type: application/json');

//$json = $_POST["order"];
//$json = $_GET["order"];
$json = json_decode(file_get_contents("php://input"), true);
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

echo json_encode($json['order']);

$arraySize = count($json);


for($i=0; $i<$arraySize; $i++){
	$item_code = $json[$i]["item_code"];
	$item_qty = $json[$i]["item_qty"];
	$order_id = $json[$i]["order_id"];
	$sql_query = "insert into order_item (item_id,order_no,quantity) values ('$item_code','$order_id','$item_qty');";
	$result = mysqli_query($con,$sql_query);
}

//	echo json_encode(array("order"=>$json);

	$json1["count"]=$arraySize;
	echo json_encode($json);


?>