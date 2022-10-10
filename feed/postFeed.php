<?php  

        $db = mysqli_connect('localhost','root','','alumni_db');
        $id = $_POST['id'];
        $contentFeed = $_POST['content'];

      
        if ($db)
        {
    
            $insert = "INSERT INTO feed (user_id, content, date_published, status) VALUES ('$id','$contentFeed',UTC_DATE,0)";
            $query = mysqli_query($db,$insert);
            if($query) {
                echo json_encode($contentFeed);
                //echo json_encode("Sucessfully posted.");
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