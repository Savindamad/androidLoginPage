<?php
	$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");

	$tableNum = $_POST["tableNum"];
    $userID = $_POST["userID"];

	$sql_query = "update table_types set waiter_id='$userID' where table_no='$tableNum';";

	$result = mysqli_query($con,$sql_query);

	if(mysqli_num_rows($result)>0){
        echo "true";
    }
    else{
        echo "false";
    }
?>