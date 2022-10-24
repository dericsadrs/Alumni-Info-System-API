<?php   
           $establishConnection = mysqli_connect("localhost", "root", "", "alumni_db");  
           
           if(!$establishConnection) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $establishConnection) 
          {

           $sqlQuery = "SELECT users.email, users.name, jobs.title, jobs.content, jobs.address, jobs.created_at FROM jobs INNER JOIN users ON users.id = jobs.user_id;";
           $queryResult = mysqli_query($establishConnection, $sqlQuery);  
           $json_array = array();  
           while($row = mysqli_fetch_assoc($queryResult))  
           {  
                $json_array[] = $row;
           }  
           echo json_encode($json_array);  
           $establishConnection -> close();
          }
           ?> 