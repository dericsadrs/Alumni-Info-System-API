<?php 
    
    $db = mysqli_connect('localhost','root','','alumni_db');

    $sql = "SELECT * FROM alumni WHERE email_address = '".$email_address."' AND password ='" .$password."'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);


    if($count == 1) {
    
        echo json_encode("Success");
    }
    else {
        echo json_encode("Error");
    }
?>
