<?php   
           $connect = mysqli_connect("localhost", "root", "", "alumni_db");  


           $name = $_POST['name'];
           if(!$connect) 
           {
                echo "Error Connecting to the Database!";
           }

           else if ($connect)
           {
          $sql = "SELECT alumni.title, alumni.full_name, university_admin.university, courses.course_name, alumni.college_batch, alumni.email_address, alumni.address,alumni.gender,alumni.job_business, alumni.contact_number, alumni.civil_status, alumni.business_address, alumni.high_school, alumni.high_school_yg, alumni.senior_highschool, alumni.senior_highschool_yg, alumni.birthday, alumni.nickname, alumni.image_path FROM alumni INNER JOIN university_admin ON alumni.university = university_admin.id INNER JOIN courses ON alumni.courses_id = courses.id WHERE alumni.full_name LIKE = '%$name%'";
            //$sql = "SELECT alumni.title, alumni.full_name, university_admin.university, courses.course_name, alumni.college_batch, alumni.email_address, alumni.address,alumni.gender,alumni.job_business, alumni.contact_number, alumni.civil_status, alumni.business_address, alumni.high_school, alumni.high_school_yg, alumni.senior_highschool, alumni.senior_highschool_yg, alumni.birthday, alumni.nickname FROM alumni INNER JOIN university_admin ON alumni.university = university_admin.id INNER JOIN courses ON alumni.courses_id = courses.id WHERE alumni.full_name LIKE = '%$name%'";
           $result = mysqli_query($connect, $sql);  
           $json_array = array(); 


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
          else 
           {
               echo "Something went wrong!";
           }
?> 