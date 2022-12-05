<?php   
             // mysqli_connect("localhost", username, password, database)
             $connect = mysqli_connect("localhost", "u693530993_alumni_db1","Alumniinformationsystem2022","u693530993_alumni_db1");

           $job_id = $_POST['job_id'];
           $title = $_POST['title'];
           $update = $_POST['update'];
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

          else if( $connect) 
          {
          
           $sql = "UPDATE jobs SET jobs.content = '$update', jobs.title = '$title' WHERE job.id = '$job_id'";
           $result = mysqli_query($connect, $sql); 
           
           if($result) {
            echo json_encode(true);
            //echo json_encode("Sucessfully posted.");
             }
             else{
                echo json_encode(false);
             }
           

           $connect -> close();
          }
        
           ?> 