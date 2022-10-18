<?php  

        $db = mysqli_connect('localhost','root','','alumni_db');
        $user_id = $_POST['user_id'];
        $question = $_POST['question'];

      
        if ($db)
        {
    
            $insert = "INSERT INTO question (user_id, content, date_published) VALUES ('$user_id','$question',UTC_DATE)";
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