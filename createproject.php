<html>
	<?php
	require 'head.php'; 
	?>
	
<body>
	<?php
	require 'header.php';
	$title = $_POST["title"];
	$shortdescription = $_POST["description"];
	$selectedcategory = $_POST["selectedcategory"];
	$minfund = $_POST["minfund"];
	$maxfund = $_POST["maxfund"];
	$enddate = $_POST["enddate"];
	$releasedate = $_POST["releasedate"];
	$imagename = $_FILES["myimage"]["name"];
	$sqlproject = "INSERT INTO project(title, shortdescription, bannername, postdate, enddate, plannedrelease,  minfund, maxfund, owneremail, status, categoryname) values ('".$title."', '".$shortdescription."', '".$imagename."', now(), '".$enddate."', '".$releasedate."', ".$minfund.", ".$maxfund.", 'sg3533@nyu.edu', 'open', '".$selectedcategory."')";
	if ($conn->query($sqlproject) === TRUE) {
	    echo "Congratulations!! Your project has been created successfully.";
	} else {
	    echo "Error: <br>" . $conn->error;
	}
	if($imagename != null){
		$imgData = addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
		$sqlimage = "INSERT INTO media(name, media) VALUES ('{$imagename}', '{$imgData}')";
		if ($conn->query($sqlimage) === TRUE) {
		    echo "New record created successfully";
		} else {
	    echo "Error: <br>" . $conn->error;
	}
	}
	
?>
</body>
</html>