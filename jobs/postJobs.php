<?php  

        $establishConnection = mysqli_connect('localhost','root','','alumni_db');

        $id = $_POST['id'];
        $titleJob = $_POST['jobTitle'];
        $contentJob = $_POST['jobContent'];
        $jobAddress = $_POST['jobAddress'];

      
        if ($establishConnection)
        {
    
            $queryInsert = "INSERT INTO jobs(user_id, title, content, address,created_at,updated_at) VALUES ('$id','$titleJob','$contentJob','$jobAddress',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
            $query = mysqli_query($establishConnection,$queryInsert);
            if($query) {
                echo json_encode(true);
            }
            else
            {
                echo json_encode(false);
            }
        }
        else {
            echo json_encode("db_error");
        }


?>