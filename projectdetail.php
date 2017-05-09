<html>
	<?php
	require 'head.php';
	?>
	<script src="processupdates.js"></script>
<body>
	<?php
	require 'header.php'; 
	$querystring = $_SERVER['QUERY_STRING'];
	$projectid = str_replace("id=", "", $querystring);
	$sql = "SELECT * FROM project where projectid=".$projectid;
	$result = $conn->query($sql);
	while ($project_array=mysqli_fetch_assoc($result))
	{
	    ?>
	    <div class="container" id="product-section">
		  <div class="row">
		   <div class="col-md-6">
		    <img id="<?php echo $project_array["projectid"]; ?>" src="imageView.php?image_name=<?php echo $project_array["bannername"]; ?>" height="300" width="300"/>
		   </div>
		   <div class="col-md-6">
		   <div class="row">
			<div class="col-md-12">
		   	<h1>
		   	<?php echo "<b>".$project_array["title"]."</b>"; ?>
	    	</h1>
			</div>
		   	<?php
		    echo $project_array["shortdescription"];
		    echo "<div> <b>Funding &nbsp; </b>";
		    echo $project_array["minfund"];
		    echo " - ";
		    echo $project_array["maxfund"];
		    echo "</div>";
		    ?>
		    </br>
			    <a type="submit" class="pledge-btn btn" name="btn-pledge" title="Back this project" href="pledge.php?projectid=<?php echo $project_array["projectid"]; ?>" id="btn-pledge">
			    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Back this project
				</a>
		   </div>
		  </div><!-- end row -->
		 </div><!-- end container -->

	    <div>

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#campaign" aria-controls="campaign" role="tab" data-toggle="tab">Campaign</a></li>
		    <li role="presentation"><a href="#updates" aria-controls="updates" role="tab" data-toggle="tab">Updates</a></li>
		    <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="campaign"><?php echo $project_array["shortdescription"]; ?></div>

		    <div role="tabpanel" class="tab-pane" id="updates">
		    <div>
				<input id="updatebtn" type='button' name='update' value='Add Update'/>
				<div class="signin-form">

			<div class="container">
		       <form class="form-signin" method="post" id="addUpdate" enctype="multipart/form-data" action="addupdate.php?projectid=<?php echo $project_array["projectid"]; ?>">
		        <h2 class="form-signin-heading">Add Updates</h2><hr />
		        <div class="form-group">
		        <textarea class='form-control' rows="4" cols="45" projectid='<?php echo $project_array["projectid"]; ?>' name='longdescription' id='longdescription' placeholder='Content' required></textarea>
		        </div>
		        <div class="form-group">
		        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
		        
		        </div>
		        <div class="form-group">
		        <input type="file" name="projmedia" id="projmedia" class="form-control" multiple="multiple" placeholder="Media">
		        <input type="hidden" name="projectid" value="<?php echo $project_array["projectid"]; ?>" >
		        </div>
		     	<hr/>
		        <div class="form-group">
		            <button type="submit" class="btn btn-default" name="btn-update" id="btn-update">
		    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Submit
					</button>
				</div>
				</form>
				<?php require 'projupd.php'; ?>
			</div>
		    </div>
		    </div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="comments">
		    	
		    	<div id='comment_type_area' class='comment_type_area'>
	            
	            <textarea class='comment' rows="2" cols="45" projectid='<?php echo $project_array["projectid"]; ?>' id='text_comment' placeholder='Write a Comment'></textarea>
	       
	            </div>
	            <div id="commentsection">
		    	<ul class="media-list">
		    	<h4 class="media-heading">Comments</h4>
				  
				      <?php fetchcomments($conn, $project_array["projectid"]); ?>
				    
				</ul>
				</div>
		    </div>
		  </div>

		</div>
	    <?php
	}
	?>
</body>
<?php
function fetchComments($conn, $projectid) {
    $sql = "SELECT * FROM projectcomments where projectid='".$projectid."'";
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
}
?>
</html>