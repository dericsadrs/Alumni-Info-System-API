 <?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  

   
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {

          
           $sql = "SELECT users.name, content, feed.date_published, feed.status FROM feed INNER JOIN users ON feed.user_id = users.id"; 
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