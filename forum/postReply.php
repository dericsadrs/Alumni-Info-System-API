<?php  

        $db = mysqli_connect('localhost','root','','alumni_db');
        $user_id = $_POST['user_id'];
        $question_id = $_POST['question_id'];
        $replyContent =$_POST['reply'];

      
        if ($db)
        {
    
            $insert = "INSERT INTO replies (user_id, question_id, reply, date_published) VALUES ('$user_id', '$question_id','$replyContent',UTC_DATE)";
            $query = mysqli_query($db,$insert);
            if($query) {
                echo json_encode("Sucessfully posted.");
            }
            else
            {
                echo json_encode("Failed to insert data.");
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