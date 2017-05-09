<html>
	<?php
	require 'head.php';
	?>
<body>
	<?php
	require 'header.php';
	$querystring = $_SERVER['QUERY_STRING'];
	$categoryname = str_replace("cat=", "", $querystring);
	?>
	<div id="main-content" class="container">
	  <h2 class="text-center menu-title">Projects</h2>
	  <div id="menu-item"> 
	    <h3 class="menu-item-title"><?php echo $categoryname; ?> Category</h3>
	    
	    
	<?php
	$sql = "SELECT * FROM project where categoryname='".$categoryname."'";
	$result = $conn->query($sql);
	$count = 0;
	while ($project_array=mysqli_fetch_assoc($result))
	{
		if($count %3 == 0){
			echo "<div class='row'>";
		}
		
	    echo "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>";
	    ?>
	    <img id="<?php echo $project_array["projectid"]; ?>" src="imageView.php?image_name=<?php echo $project_array["bannername"]; ?>" height="300" width="300"/><br/>
	    <?php
	    echo htmlspecialchars($project_array["title"])."<div>".$project_array["shortdescription"]."</div>"."</div>";
	    if(($count+1) %3 == 0){
			echo "</div>";
		}
	    $count += 1;
	}
	?>
	</div>
	</div>
</body>
<?php
function fetchMedia($conn, $projectid) {
    $sql = "SELECT * FROM projectmedia where projectid='".$projectid."'";
	$result = $conn->query($sql);
	while ($media_array=mysqli_fetch_assoc($result))
	{
		?>
			<img src="imageView.php?image_id=<?php echo $media_array["mediaid"]; ?>" height="300" width="300"/><br/>
		<?php
	}
}
?>
</html>