<?php

$con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");

header('Content-Type: application/json');

//$json = $_POST["order"];
$json = array({
    "John": {
        "status":"Wait"
    },
    "Jennifer": {
        "status":"Active"
    },
    "James": {
        "status":"Active",
        "age":56,
        "count":10,
        "progress":0.0029857,
        "bad":0
    });

echo $json;

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "$key:\n";
    } else {
        echo "$key => $val\n";
    }
}


?>