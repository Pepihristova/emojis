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
	
	<?php 
	$read_query1 = "SELECT * FROM `history` WHERE recipient = '$filter' ";
	$result1 = mysqli_query($conn, $read_query1);
$read_query2 = "SELECT * FROM `emoji` WHERE 1";
	$result2 = mysqli_query($conn, $read_query2);
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
						$emoji_replace = str_replace('hi', '<img src="uploads/hell.png">', $message);
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
	<a href="emojipedia.php">See the emojipedia here</a>
</div>
</body>
</html>
