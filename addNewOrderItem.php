<?php

$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");



//$json = $_POST["order"];
$json = array(
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

echo json_encode($json[0]);

$jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($json, TRUE)),RecursiveIteratorIterator::SELF_FIRST);
foreach ($jsonIterator as $key => $val) {
	echo json_encode($json);
    if(is_array($val)) {
    	echo json_encode($json);
        echo json_encode($key);
    } else {
        echo json_encode($val);
        echo json_encode($json);
    }
}
header('Content-Type: application/json');
echo json_encode($json);


echo json_encode($json);




?>