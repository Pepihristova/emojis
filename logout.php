<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php 
	include "includes/db_connect.php";
	?>
	<title></title>
</head>
<body>
	<form action="" method="post">
	<input type="submit" name="submit">
	</form>
	<?php 
	if (isset($_POST)) {
		session_destroy();
		header('Location:index.php');
	}



	 ?>
</body>
</html>