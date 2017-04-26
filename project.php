<html>
	<?php
	require 'head.php'; 
	?>
<body>
	<?php
	require 'header.php'; 
	?>
	<p> Create your project with project title, category, image, funding goal, campaign duration.</p>
    <form action="getdata.php" method="POST" enctype="multipart/form-data">
		<p>Project Title &nbsp; <input type="text" name="title"></p>
		<p>Description &nbsp; <textarea name="description" rows="2" cols="45"></textarea></p>
	 	<p> Media &nbsp; <input type="file" name="myimage"> </p>
		<p> Category &nbsp;

		<?php 
		$categories = array();
			$sql = "SELECT categoryname FROM categories";
			$result = $conn->query($sql);
			echo "<select name='category'>";
			while ($cat_array=mysqli_fetch_assoc($result))
			{
			   echo "<option value='' >".htmlspecialchars($cat_array["categoryname"])."</option>";
			}
			echo "</select>";
			?>
		</p>
		<p> Min Fund &nbsp; <input type="text" name="minfund"></p>
		<p> Max Fund &nbsp; <input type="text" name="maxfund"></p>
		<p> Release Date &nbsp; <input type="text" id="datepicker">
		</p>
		<input type="submit" value="Send">
		<input type="reset" value="Clear">
	</form>
</body>
</html>