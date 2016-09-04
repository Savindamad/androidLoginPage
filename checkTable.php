<?php
	$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");
	header('Content-Type: application/json');


    $tableNum = $_POST["tableNum"];

	$sql_query = "select waiter_id from table where table_no='$tableNum';";
	$result = mysqli_query($con,$sql_query);
    $num_of_rows = mysqli_num_rows($result);


    if($num_of_rows>0){
        $row=mysqli_fetch_assoc($result);
        $json["success"]=$row;
        echo json_encode($row);
    }
    else{
        $json["error"]='Can not access database';
        echo json_encode($json);
    }

?>