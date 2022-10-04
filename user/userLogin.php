<?php
        $db = mysqli_connect('localhost','root','','alumni_db');
        $email_address= $_POST['email_address'];
        $password = $_POST['password'];
       
        $sql = "SELECT users. id, alumni.title, alumni.full_name, university_admin.university, courses.course_name, alumni.college_batch, alumni.email_address, alumni.address,alumni.gender,alumni.job_business, alumni.contact_number, alumni.civil_status, alumni.business_address, alumni.high_school, alumni.high_school_yg, alumni.senior_highschool, alumni.senior_highschool_yg, alumni.birthday, alumni.nickname FROM alumni INNER JOIN university_admin ON alumni.university = university_admin.id INNER JOIN courses ON alumni.courses_id = courses.id INNER JOIN users ON users.alumni_id = alumni.id WHERE alumni.email_address = '".$email_address."' AND alumni.password = '".$password."'";
        $result = mysqli_query($db,$sql);
        $count = mysqli_num_rows($result);
        $json_array = [];
        while($row = mysqli_fetch_assoc($result))  
        {  
             $json_array[] = $row;
        }  

        if($count == 1) {
            $json_array['loginStatus'] = true;
        
            echo json_encode($json_array);
          }
        else {
          $json_array['loginStatus']=false;
            echo json_encode($json_array);
          
        }
?>