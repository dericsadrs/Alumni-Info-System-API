<?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  
           $sql = "SELECT users. email_address, users.name, jobs.content, jobs.date_published FROM `jobs` INNER JOIN users ON jobs.user_id = users.id";
           $result = mysqli_query($connect, $sql);  
           $json_array = array();  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;
           }  
           echo json_encode($json_array);  
           $connect -> close();
           ?> 