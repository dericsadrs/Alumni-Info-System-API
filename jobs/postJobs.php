<?php  

        $db = mysqli_connect('localhost','root','','alumni_db');

        $id = $_POST['id'];
        $titleJob = $_POST['jobTitle'];
        $contentJob = $_POST['jobContent'];
        $jobAddress = $_POST['jobAddress'];

      
        if ($db)
        {
    
            $insert = "INSERT INTO jobs(user_id, title, content, address,created_at,updated_at) VALUES ('$id','$titleJob','$contentJob','$jobAddress',UTC_TIMESTAMP,UTC_TIMESTAMP)";
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