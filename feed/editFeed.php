<?php   
             // mysqli_connect("localhost", username, password, database)
             $connect = mysqli_connect("localhost", "u693530993_alumni_db1","Alumniinformationsystem2022","u693530993_alumni_db1");

           $feed_id = $_POST['feed_id'];
           $title = $_POST['title'];
           $update = $_POST['update'];
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {
          
           $sql = "UPDATE feeds SET feeds.content = '$update', feeds.title = '$title' WHERE feeds.id = '$feed_id'";
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