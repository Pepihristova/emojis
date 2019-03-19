<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="includes/style.css">
	<title></title>
	<?php 
$title = 'Read';
include "includes/db_connect.php";
echo $_SESSION['user'];
$filter = $_SESSION['user'];
?>
</head>
<body>
<h1>The story of your message</h1>
  <a class="btn btn-default" href="logout.php">Log out</a>
	
	<?php 
	$read_query1 = "SELECT * FROM `history` WHERE username = '$filter' ";
$result1 = mysqli_query($conn, $read_query1);
		if (mysqli_num_rows($result1) > 0) {
	?>
	<h2>Stepinger</h2>
	<div class="col-lg-6">
	<table border="1" class="table table-striped">
		<td>Username</td>
		<td>Message</td>
		<td>Me</td>
		<td>Date</td>
	</div>
	<?php
	while ($row1= mysqli_fetch_assoc($result1)) {
		?>
			<tr>
		<td>
			<?=$row1['username']?>
		</td>
		<td>
						<?php 
						$message = $row1['message'];
						$chars = ['hi',':heart_eyes:',':sob:',':smiling_imp:',':hear_no_evil:',':--:',':conf',':)',':kiss',':(',':O'];
						$icons = ['<img src="uploads/cry_laugh.png">','<img src="uploads/Heart_Eyes_Emoji.png">','<img src="uploads/cry.png">','<img src="uploads/hell.png">','<img src="uploads/monkey.png">','<img src="uploads/zipper.png">','<img src="uploads/confused.png">','<img src="uploads/happy.png">','<img src="uploads/kiss.png">','<img src="uploads/Weary_Face_Emoji_Icon_ios10.png">','<img src="uploads/wow.png">'];

						$emoji_replace = str_replace($chars, $icons, $message);
						echo "$emoji_replace";
						?>
						
					</td>
		<td>
			<?=$row1['recipient']?>
		</td>
		<td>
			<?=$row1['date_added']?>
		</td>
		</tr>
		<?php  
	}
	?>
	</table>
	<?php  
}
	 ?>
<a href="new_message.php">Add a new message</a>
<a href="sent_messages.php">See the history of the sent messages</a>
</div>
</body>
</html>
