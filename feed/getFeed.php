 <?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  

   
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {

          
           $sql = "SELECT users.name,feeds.title, feeds.content, feeds.created_at FROM feeds INNER JOIN users ON feeds.user_id = users.id WHERE status = 1"; 
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