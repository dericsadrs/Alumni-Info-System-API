<?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  


           $name = $_POST['name'];
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

           else if ($connect)
           {
            if(isset($name))
            {
           $sql = "SELECT alumnis.title, alumnis.full_name, alumnis.email_address, university_admins.university, courses.course, alumnis.gender,alumnis.address, alumnis.contact_number, alumnis.civil_status,alumnis.birthday,alumnis.job_business,alumnis.business_address,alumnis.high_school,alumnis.high_school_yg,alumnis.senior_highschool,alumnis.senior_highschool_yg,alumnis.college_batch,alumnis.nickname, alumnis.image_path FROM alumnis INNER JOIN users ON users.id = alumnis.user_id INNER JOIN courses ON alumnis.courses_id = courses.id INNER JOIN university_admins ON alumnis.university = university_admins.id WHERE alumnis.full_name LIKE '%$name%';";
           $result = mysqli_query($connect, $sql);  


              if($result) 
                {
                    while($row = mysqli_fetch_assoc($result))  
                    {  
                    $json_array[] = $row;
                    }      
                    echo json_encode($json_array);  
                     $connect -> close();
                }
           
        
                }
            }
          else 
           {
               echo "Something went wrong!";
           }
?> 