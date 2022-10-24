<?php   
           $establishConnection = mysqli_connect("localhost", "root", "", "alumni_db");  

           $user_id = $_POST['user_id'];
           if(!$establishConnection) 
           {
                echo json_encode("db_error");
           }

          else if( $establishConnection) 
          {
           $sql = "DELETE FROM jobs WHERE id = '$user_id'"; 
           $result = mysqli_query($establishConnection, $sql); 
           
           if($result) {
            echo json_encode(true);
            //echo json_encode("Sucessfully posted.");
             }
             else{
                echo json_encode(false);
             }
           $establishConnection -> close();
          }
        
           ?> 