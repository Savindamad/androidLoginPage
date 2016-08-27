<?php
$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");
$sql_query = "select * from menu_items; ";

$result = mysqli_query($con,$sql_query);
$num_of_rows = mysqli_num_rows($result);

$temp_array = array();

if($num_of_rows>0){
	while($row=mysqli_fetch_assoc($result)){
		$temp_array[] = $row;
		echo $row;
	}
}

header('Content-Type: application/json');
echo json_encode(array("menu_items"=>$temp_array));

?>