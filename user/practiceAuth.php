<?php

         $db =  mysqli_connect('localhost','root','','alumni_db');

        $email = "gebs@gmail.com";
        $password = "password";
        
        if($db) 
        {
              
                $verifyEmail = "SELECT email FROM users WHERE email = '".$email."'";
                $emailQuery = mysqli_query($db,$verifyEmail);
                $count = mysqli_num_rows($emailQuery);
             
                if($count == 1 ) {
               
                    $verifyPasword = "SELECT password FROM users WHERE email ='".$email."'";
                    $passwordQuery = mysqli_query($db,$verifyPasword);
                    $rowPassword = mysqli_fetch_object($passwordQuery);
                    
                    $json_pass['password'] = $rowPassword -> password;

                    if(password_verify($password, $json_pass['password'])) {
                     
                        $fetchUser = "SELECT * FROM alumnis INNER JOIN users ON users.id = alumnis.user_id WHERE users.email = '".$email."'";
                        $queryFetch = mysqli_query($db,$fetchUser);
                     
                        $countUser = mysqli_num_rows($queryFetch);


                        if($countUser == 1)
                        {
                        $row = mysqli_fetch_object($queryFetch);
                    
                        $json_array = [];
                        $json_array['loginStatus'] = true;
                        $json_array['id'] = $row -> id;
                        $json_array['title'] = $row -> title;
                        $json_array['university'] = $row -> university;
                        $json_array['full_name'] = $row -> full_name;
                        $json_array['course_name'] = "tambay";
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
                        echo json_encode($json_array);
                        }
                    }
                    else
                    {
                        echo "wromg password";
                    }
                }
                else{
                    echo "email not found";
                }
            }
     
        else
        {
            echo "DB ERROR";
            
        }

            
 ?>
