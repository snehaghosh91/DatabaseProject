<html>
	<?php
	require 'head.php'; 
	?>
<body>
	<?php
	require 'header.php'; 
	$sql = "SELECT categoryname FROM categories";
	$result = $conn->query($sql);
	while ($cat_array=mysqli_fetch_assoc($result))
	{
	    echo "<a href='projectlist.php?cat=".$cat_array["categoryname"]."''>".htmlspecialchars($cat_array["categoryname"])."</a> </br>";
	}
	?>
</body>
</html>