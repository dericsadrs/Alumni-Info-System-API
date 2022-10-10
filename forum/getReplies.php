<?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  

           $question_id = $_POST['question_id'];
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {

          
           $sql = "SELECT question.id, users.name, replies.reply, replies.date_published FROM `question` INNER JOIN replies ON replies.question_id = question.id INNER JOIN users ON users.id = replies.user_id WHERE question.id = '$question_id'";
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