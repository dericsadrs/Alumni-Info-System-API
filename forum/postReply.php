<?php  
          // mysqli_connect("localhost", username, password, database)
          $db = mysqli_connect("localhost", "u693530993_alumni_db1","Alumniinformationsystem2022","u693530993_alumni_db1");
        $user_id = $_POST['user_id'];
        $question_id = $_POST['question_id'];
        $replyContent =$_POST['reply'];

      
        if ($db)
        {
    
            $insert = "INSERT INTO replies (user_id, forum_id, content, created_at,updated_at) VALUES ('$user_id', '$question_id','$replyContent',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
            $query = mysqli_query($db,$insert);
            if($query) {
                echo json_encode(true);
            }
            else
            {
                echo json_encode(false);
            }
        }
        else {
            echo json_encode("Error Connectiong to the database.");
        }
    
      /*  else if (!$db)
        {
            echo json_encode("Error");
        }
        if(isset($contentFeed) and isset($id) ) 
        {

        }*/
  

?>