<html>
	<?php
	require 'head.php'; 
	?>
<body>
	<?php
	require 'header.php'; 
	?>
	<p> Create your project with project title, category, image, funding goal, campaign duration.</p>
    <form action="createproject.php" name="createproject" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
		<p>Project Title<span class="star">*</span> &nbsp; <input type="text" name="title">
		 <div id="title" class="showerror">   </div></p>
		<p>Description &nbsp; <textarea name="description" rows="2" cols="45"></textarea></p>
	 	<p> Media &nbsp; <input type="file" name="myimage"> </p>
		<p> Category<span class="star">*</span> &nbsp;

		<?php 
		$categories = array();
			$sql = "SELECT categoryname FROM categories";
			$result = $conn->query($sql);
			echo "<select name='category' onchange=document.getElementById('selectedcategory').value=this.options[this.selectedIndex].text>";
			$count = 0;
			echo "<option value=$count > Select Category </option>";
			while ($cat_array=mysqli_fetch_assoc($result))
			{
				$count += 1;
			    echo "<option value=$count >".htmlspecialchars($cat_array["categoryname"])."</option>";
			}
			echo "</select>";
			?>
			<input type="hidden" name="selectedcategory" id="selectedcategory" value="" />
			<div id="category" class="showerror">   </div>
		</p>
		<p> Min Fund<span class="star">*</span> &nbsp; <input type="text" name="minfund">
			<div id="minfund" class="showerror">   </div>
		</p>
		<p> Max Fund<span class="star">*</span> &nbsp; <input type="text" name="maxfund">
			<div id="maxfund" class="showerror">   </div>
		</p>
		<p> End Date<span class="star">*</span> &nbsp; <input type="text" id="enddatepicker" name="enddate">
		<div id="enddate" class="showerror">   </div>
		</p>
		<p> Release Date<span class="star">*</span> &nbsp; <input type="text" id="releasedatepicker" name="releasedate">
		<div id="releasedate" class="showerror">   </div>
		</p>
		<input type="submit" value="Send">
		<input type="reset" value="Clear">
	</form>
</body>
</html>