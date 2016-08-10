<?php
	$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");

	if($con){
		echo "<br><h3>Connection success</h3></br>";
	}
	else{
		die("Error in connection".mysqli_connect_error());
	}
?>