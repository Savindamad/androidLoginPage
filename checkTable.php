<?php
	$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");

	$tableNum = $_POST["tableNum"];

	$sql_query = "select waiter_id from table where table_no like '$tableNum';";

	$result = mysqli_query($con,$sql_query);
	if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $userID = $row["waiter_id"];
        echo $userID;
    }
    else{
        echo "Error";
    }
?>