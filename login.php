<?php
    $con = mysqli_connect("br-cdbr-azure-south-b.cloudapp.net", "b50735a87d1621", "8a720e5f", "smart_rms");
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql_query = "select user_id from user_account where username like '$username' and password like '$password';";

    $result = mysqli_query($con,$sql_query);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $userID = $row["user_id"];
        echo $userID;
    }
    else{
        echo "Login fail...";
    }
?>