<?php   
           $establishConnection = mysqli_connect("localhost", "u693530993_alumni_db1","Alumniinformationsystem2022","u693530993_alumni_db1");
           $user_id = $_POST['user_id'];
           if(!$establishConnection) 
           {
                echo "Error Connecting to the Database!";
           }

          else if($establishConnection) 
          {

          
           $sql = "SELECT  jobs.id, jobs.title, jobs.content, jobs.address, jobs.created_at FROM jobs INNER JOIN users ON users.id = jobs.user_id WHERE users.id = '$user_id'"; 
           $result = mysqli_query($establishConnection, $sql);  
           $json_array = array();  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
          
           echo json_encode($json_array);  

           $establishConnection -> close();
          }
           ?> 