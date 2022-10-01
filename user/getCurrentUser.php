<?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  

           $email_address = $_POST['email_address'];
           $password = $_POST['password'];
           $sql = "SELECT * FROM alumni WHERE email_address = '".$email_address."' AND password ='" .$password."'";
           $result = mysqli_query($connect, $sql);  
           $json_array = array();  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;
           }  
           echo json_encode($json_array);  
           $connect -> close();
           ?> 