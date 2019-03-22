<?php 
session_start();
include "includes/db_connect.php";
echo $_SESSION['user_id'];
$id1 = $_SESSION['user_id'];
$read_query = "SELECT * FROM `user`";
$result = mysqli_query($conn, $read_query);
$read_query_image = "SELECT * FROM emoji";
$images_result = mysqli_query($conn, $read_query_image);
$read_query_recipient = "SELECT * FROM recipient";
$recipient_result = mysqli_query($conn, $read_query_recipient);
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="includes/style.css">
	<title></title>
</head>
<body>
<form action="" method="post">
		<input type="text" name="message" placeholder="code">
		<div class="row justify-content-md-center mb-2">
		<form action="" method="get">
			<div class="form-row">				
				<div class="col-sm-5">
					<select class="form-control" name="username">
						<?php if(mysqli_num_rows($recipient_result) > 0){ ?>
							
							<?php while($row = mysqli_fetch_assoc($recipient_result)){ ?>

								<option value="<?= $row['recipient_id'] ?>"><?= $row['name'] ?></option>

							<?php } ?>

						<?php } ?>
					</select>	
					
				</div>
		<input type="submit" name="submit" value="Create1">
	</form>
	<img src="uploads/hell.png">
<?php  

if (isset($_POST['submit'])) {
			 $code = mysqli_real_escape_string( $conn, $_POST['message']);
			$name = $_SESSION['user'];
			$id1 = $_SESSION['user_id'];
			$recipient_friend = $_POST['username'];
			$date = date('Y-m-d-h:i:s');
			$q_create = "INSERT INTO `history`(`user_id`, `message`, `recipient_id`, `date_added`) VALUES ('$id1','$code','$recipient_friend','$date')";
var_dump($q_create);
			$result = mysqli_query($conn, $q_create);

			if ($result) {
				//echo "Success";
				header('Location: type_to.php');
			}else{
				echo mysqli_error($conn);
				//echo "Pleaseq try again later";
			}
		}
		?>
</body>
</html>
