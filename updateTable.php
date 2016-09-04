<?php
	$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");
    header('Content-Type: application/json');

    $userID = $_POST["userID"];
    $tableNum = $_POST["tableNum"];

	$sql_query = "update table_type set waiter_id='$userID' where table_no='$tableNum';";

	$result = mysqli_query($con,$sql_query);
    $num_of_rows = mysqli_num_rows($result);

    $json["success"]="true";
    echo json_encode($json);
?>