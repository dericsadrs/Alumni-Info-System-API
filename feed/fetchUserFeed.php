<?php   
            // mysqli_connect("localhost", username, password, database)
            $connect = mysqli_connect("localhost", "u693530993_alumni_db1","Alumniinformationsystem2022","u693530993_alumni_db1");

           $user_id = $_POST['user_id'];
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {

          
          $sql = "SELECT feeds.id, feeds.title, feeds.content, feeds.created_at FROM feeds WHERE user_id = '$user_id'";
     
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