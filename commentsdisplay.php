<html>
	<?php
	require 'head.php';
	?>
<body>
	<?php
	$querystring = $_SERVER['QUERY_STRING'];
	$projectid = str_replace("projectid=", "", $querystring);
	?>
	<div role="tabpanel" class="tab-pane" id="comments">
		    	
    	<div id='comment_type_area' class='comment_type_area'>
        
        <textarea class='comment' rows="2" cols="45" projectid='<?php echo $projectid; ?>' id='text_comment' placeholder='Write a Comment'></textarea>
   
        </div>
        <div id="commentsection">
    	<ul class="media-list">
    	<h4 class="media-heading">Comments</h4>
		 
				
	<?php
	
	$sql = "SELECT * FROM projectcomments where projectid=".$projectid;
	$result = $conn->query($sql);
	while ($comment_array=mysqli_fetch_assoc($result))
	{
		?>
		<li class="media">
		<div class="media-left">
		<?php echo $comment_array["comment"]; ?>
		</div>
		</li>
		<?php
	}
	?>

		</ul>
		</div>
	</div>
</body>

</html>