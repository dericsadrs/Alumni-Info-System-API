<?php   
             // mysqli_connect("localhost", username, password, database)
          $connect = mysqli_connect("localhost", "u693530993_alumni_db1","Alumniinformationsystem2022","u693530993_alumni_db1");

           $reply_id = $_POST['reply_id'];
           $update = $_POST['update'];
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {
          
           $sql = "UPDATE replies SET replies.content = '$update' WHERE replies.id = '$reply_id'";
           $result = mysqli_query($connect, $sql); 
           
           if($result) {
            echo json_encode(true);
            //echo json_encode("Sucessfully posted.");
             }
             else{
                echo json_encode(false);
             }
           

           $connect -> close();
          }
        
           ?> 