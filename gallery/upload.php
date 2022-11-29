<?php


    $db = mysqli_connect("localhost", "u693530993_alumni_db1","Alumniinformationsystem2022","u693530993_alumni_db1");
    
    if ($db)
    {
    $user_id = $_POST['user_id'];
    $description = $_POST['description'];
	$image = $_FILES['image']['name'];
	$name = $_POST['image_name'];
	$imagePath = "../../storage/images/".$image;
	$tmp_name = $_FILES['image']['tmp_name'];

	 $move = (move_uploaded_file($tmp_name, $imagePath));
     if ($move)
     {
     $fix_path = "images/";
     $name = $fix_path . '' . $name;
     $insert = "INSERT INTO galleries (user_id, image, description, created_at, updated_at, status) VALUES ('$user_id','$name','$description',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,0)"; 
     $query = mysqli_query($db,$insert);
     }
     else{
        echo "Failed to upload image";
     }

     $query = mysqli_query($db,$insert);
     
    }
    else
    {
        echo json_encode("Error Connectiong to the database.");
       
    }


?>