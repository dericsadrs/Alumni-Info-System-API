<?php  

        $db = mysqli_connect('localhost','root','','alumni_db');
    
        $id = $_POST['id'];
        $feedtitle = $_POST['feedtitle'];
        $contentFeed = $_POST['content'];

      
        if ($db)
        {
    
            $insert = "INSERT INTO feeds ( user_id, title, content, created_at, updated_at, status) VALUES ('$id','$feedtitle','$contentFeed',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,0)";
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

?>