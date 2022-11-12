<?php  

        // mysqli_connect("localhost", username, password, database)
        $db = mysqli_connect("localhost", "u693530993_alumni_db1","Alumniinformationsystem2022","u693530993_alumni_db1");
    
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