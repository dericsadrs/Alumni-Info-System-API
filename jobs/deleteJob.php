<?php   
          // mysqli_connect("localhost", username, password, database)
          $establishConnection = mysqli_connect("localhost", "u693530993_alumni_db1","Alumniinformationsystem2022","u693530993_alumni_db1");
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