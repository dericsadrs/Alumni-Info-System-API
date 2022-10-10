<?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  

   
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {

          
           $sql = "SELECT question.id, question.user_id, name, content,date_published FROM question INNER JOIN users ON question.user_id = users.id;";
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