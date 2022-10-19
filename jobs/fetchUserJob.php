<?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  

           $user_id = $_POST['user_id'];
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {

          
           $sql = "SELECT  jobs.id, jobs.title, jobs.content, jobs.address, jobs.created_at FROM jobs INNER JOIN users ON users.id = jobs.user_id WHERE users.id = '$user_id'"; 
           $result = mysqli_query($connect, $sql);  
           $json_array = array();  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
          
           echo json_encode($json_array);  

           $connect -> close();
          }
           ?> 