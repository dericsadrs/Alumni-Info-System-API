<?php   
           $establishConnection = mysqli_connect("localhost", "root", "", "alumni_db");  

          if(!$establishConnection)
          {
               echo json_encode("db_error");
          }
          else if($establishConnection)
          {

           $sqlQuery = "SELECT * FROM perks";
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