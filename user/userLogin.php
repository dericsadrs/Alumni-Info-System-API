<?php

         $establishConnection = mysqli_connect("localhost", "u693530993_alumni_db1","Alumniinformationsystem2022","u693530993_alumni_db1");

        $email = $_POST['email'];
        $password = $_POST['password'];

        
        if($establishConnection) 
        {
              
                $verifyEmail = "SELECT email FROM users WHERE email = '$email'";
                $emailQuery = mysqli_query($establishConnection,$verifyEmail);
                $count = mysqli_num_rows($emailQuery);
             
                if($count == 1 ) {
               
                    $verifyPasword = "SELECT password FROM users WHERE email ='$email'";
                    $passwordQuery = mysqli_query($establishConnection,$verifyPasword);
                    $rowPassword = mysqli_fetch_object($passwordQuery);
                    
                    $json_pass['password'] = $rowPassword -> password;

                    if(password_verify($password, $json_pass['password'])) {
                     
                      
                        $fetchUser = "SELECT users.id, alumnis.title, alumnis.full_name, alumnis.email_address, university_admins.university, courses.course, alumnis.gender,alumnis.address, alumnis.contact_number, alumnis.civil_status,alumnis.birthday,alumnis.job_business,alumnis.business_address,alumnis.high_school,alumnis.high_school_yg,alumnis.senior_highschool,alumnis.senior_highschool_yg,alumnis.college_batch,alumnis.nickname, alumnis.image_path FROM alumnis INNER JOIN users ON users.id = alumnis.user_id INNER JOIN courses ON alumnis.courses_id = courses.id INNER JOIN university_admins ON alumnis.university = university_admins.id WHERE email = '$email' AND status = 1";
                        $queryFetch = mysqli_query($establishConnection,$fetchUser);
                     
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
                        $json_array['course'] = $row -> course;
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
                        else
                    {
                        $json_array['loginStatus'] = false;
                        $json_array['message'] = "pending";
                        echo json_encode($json_array);
                    }
                        
                    }
                    else
                    {
                        $json_array['loginStatus'] = false;
                        $json_array['message'] = "!pw";
                        echo json_encode($json_array);
                    }
                }
                else{
                    $json_array['loginStatus'] = false;
                    $json_array['message'] = "!user";
                    echo json_encode($json_array);
                }
            }

            else if (!$establishConnection){
             $json_array['loginStatus'] = false;
            $json_array['message'] = "error_db";
            echo json_encode($json_array);
            }
            else{
                $json_array['loginStatus'] = false;
                $json_array['message'] = "fatal_error";
                echo json_encode($json_array);
            }
     

            
 ?>
