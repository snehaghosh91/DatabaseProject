<html>
	<?php
	require 'head.php'; 
	?>
<body>
	<?php
	require 'header.php';
	$querystring = $_SERVER['QUERY_STRING'];
	$projectid = str_replace("id=", "", $querystring);
	?>
	<div class="signin-form">
	<div class="container">
    <form class="form-signin" method="post" name="pledge-form" id="pledge-form">
    <h2 class="form-signin-heading">Support this project</h2><hr />
 		<div class="form-group">
        <input type="text" class="form-control" placeholder="Pledge Amount" name="pledgeamount" required/>
        </div>

		<?php
			$sql = "SELECT ccn FROM creditcardowner where email='".$email."'";
			$result = $conn->query($sql);
			echo "<select name='ccn' required class='form-control' onchange=document.getElementById('selectedcategory').value=this.options[this.selectedIndex].text>";
			$count = 0;
			echo "<option value='' > Select Card </option>";
			while ($ccn_array=mysqli_fetch_assoc($result))
			{
				$count += 1;
			    echo "<option value=$count >".htmlspecialchars($ccn_array["ccn"])."</option>";
			}
			echo "</select>";
			?>
			<input type="hidden" name="selectedcategory" id="selectedcategory" value="" />
			<div id="category" class="showerror">   </div>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Pledge
			</button> 
            <button type="reset" class="btn btn-default"> Clear
            </button>
        </div>
		
		
	</form>
</body>
</html>