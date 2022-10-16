<?php  

        $db = mysqli_connect('localhost','root','','alumni_db');
        $id = $_POST['id'];
        $contentJob = $_POST['jobContent'];

      
        if ($db)
        {
    
            $insert = "INSERT INTO jobs(user_id, content, date_published) VALUES ('$id','$contentJob',UTC_TIMESTAMP)";
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