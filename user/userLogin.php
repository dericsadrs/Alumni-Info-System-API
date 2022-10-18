<?php
        $db = mysqli_connect('localhost','root','','alumni_db');
        $email_address= $_POST['email_address'];
        $password = $_POST['password'];


  
       if(isset ($email_address))
       {
            $sql = "SELECT users. id, alumnis.title, alumnis.full_name, university_admin.university, courses.course_name, alumnis.college_batch, alumnis.email_address, alumnis.address,alumnis.gender,alumnis.job_business, alumnis.contact_number, alumnis.civil_status, alumnis.business_address, alumnis.high_school, alumnis.high_school_yg, alumnis.senior_highschool, alumnis.senior_highschool_yg, alumnis.birthday, alumnis.nickname, alumnis.image_path FROM alumnis INNER JOIN university_admin ON alumnis.university = university_admin.id INNER JOIN courses ON alumnis.courses_id = courses.id INNER JOIN users ON users.alumnis_id = alumnis.id WHERE alumnis.email_address = '".$email_address."' AND alumnis.password = '".$password."'";
            $result = mysqli_query($db,$sql);
            $count = mysqli_num_rows($result);
            $json_array = [];
 
            
        if($count == 1) {
            $row = mysqli_fetch_object($result);
            $json_array['loginStatus'] = true;
            $json_array['id'] = $row -> id;
            $json_array['title'] = $row -> title;
            $json_array['university'] = $row -> university;
            $json_array['full_name'] = $row -> full_name;
            $json_array['course_name'] = $row -> course_name;
            $json_array['college_batch'] = $row -> college_batch;
            $json_array['email_address'] = $row -> email_address;
            $json_array['address'] = $row -> address;
            $json_array['gender'] = $row -> gender;
            $json_array['job_business'] = $row -> job_business;
            $json_array['contact_number'] = $row -> contact_number;
            $json_array['civil_status'] = $row -> civil_status;
            $json_array['business_address'] = $row -> business_address;
            $json_array['high_school'] = $row -> high_school;
            $json_array['high_school_yg'] = $row -> high_school_yg;
            $json_array['senior_highschool'] = $row -> senior_highschool;
            $json_array['senior_highschool_yg'] = $row -> senior_highschool_yg;
            $json_array['birthday'] = $row -> birthday;
            $json_array['nickname'] = $row -> nickname;
            $json_array['image_path'] = $row -> image_path;
;
            echo json_encode($json_array);
        }
        else {
          $json_array['loginStatus']=false;
          echo json_encode($json_array);
        
          
        }
      }

?>