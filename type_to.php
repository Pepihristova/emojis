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
	$read_query1 = "SELECT * FROM `history` WHERE recipient = '$filter' ";
	$result1 = mysqli_query($conn, $read_query1);
$read_query2 = "SELECT * FROM `emoji` WHERE 1";
	$result2 = mysqli_query($conn, $read_query2);
	if (mysqli_num_rows($result1) > 0) {
		?>
		<h2>Stepinger</h2>
		<div class="container">
		<div class="col-lg-12">
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
						$message_arr = explode(' ', $message);
						for($i = 0; $i < count($message_arr); $i++){
						
							$read_query2 = "SELECT image_emoji FROM `emoji` WHERE string='{$message_arr[$i]}'";
							
							$emoji_res = mysqli_query($conn, $read_query2);
							if (mysqli_num_rows($emoji_res) > 0) {

								$emoji = mysqli_fetch_assoc($emoji_res);
								$icon = '<img width="15px"src="uploads/' . $emoji['image_emoji'] . '">';
								
								if(!empty($icon)){
									// $m = $icon;
									$message_arr[$i] = $icon;
								}
							}							
						}						
						 // while ($row2 = mysqli_fetch_assoc($result2)) {
							// $char=$row2['string'];
							// $icons = '<img src="' . $row2['image_emoji'] . '"';
						
							
						// }

						// $emoji_replace = str_replace($char, $icons, $message);
						// echo "$emoji_replace";
						
						$message = implode(' ', $message_arr);
						echo $message;
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
	</div>
	<a href="new_message.php">Add a new message</a>
	<a href="sent_messages.php">See the history of the sent messages</a>
	<a href="emojipedia.php">See the emojipedia here</a>
</div>
</body>
</html>
