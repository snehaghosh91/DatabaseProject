<?php
require 'dbconnect.php'; 
$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imgData = addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
//Insert the image name and image content in image_table
$sql="INSERT INTO test_image(id, name, image) VALUES
                    ('1', '{$imagename}', '{$imgData}')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: <br>" . $conn->error;
}
?>