<?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  

           $user_id = $_POST['user_id'];
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {
          $sql = "SELECT forums.content AS forum_content,replies.id, replies.content,replies.created_at FROM replies INNER JOIN forums ON forums.id = replies.forum_id WHERE replies.user_id = '$user_id'";
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