
           <?php   
           $connect = mysqli_connect("localhost", "root", "", "ais_db");  
           $sql = "SELECT content, FROM feed"; 
           $result = mysqli_query($connect, $sql);  
           $json_array = array();  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
           echo json_encode($json_array);  

           $connect -> close();
           ?> 