<?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  

           $user_id = $_POST['forum_id'];
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {

            $sql = "DELETE forums, replies FROM forums INNER JOIN replies ON replies.forum_id = forums.id WHERE forums.id = '$user_id'"; 
   
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