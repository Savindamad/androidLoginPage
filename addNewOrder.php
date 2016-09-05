<?php
	$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");
	header('Content-Type: application/json');

	//$sql_query= "select max("order_no") as ("primary key") from ("customer_order");";
	//$sql_query = "SELECT * from customer_order ORDER BY order_no DESC LIMIT 0,1;";

	$sql_query = "select max(order_no) from customer_order;";
	$result = mysqli_query($con,$sql_query);

	while($row = mysqli_fetch_array($result)){
	?>
		<tr>
			<td> <?php echo $row['order_no'] ?> </td>
		</tr>
	<?php
	}
?>