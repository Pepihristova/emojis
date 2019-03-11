<?php 
session_start();
include "includes/db_connect.php";
$read_query = "SELECT * FROM `user` ";
$result = mysqli_query($conn, $read_query);
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
						<?php if(mysqli_num_rows($result) > 0){ ?>
							
							<?php while($row = mysqli_fetch_assoc($result)){ ?>

								<option value="<?= $row['username'] ?>"><?= $row['username'] ?></option>

							<?php } ?>

						<?php } ?>
					</select>	
				</div>
		<input type="submit" name="submit" value="Create1">
	</form>

<?php  

if (isset($_POST['submit'])) {
			$name = $_SESSION['user'];
			$code = $_POST['message'];
			$locale = $_POST['username'];
			$image = date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
			$q_create = "INSERT INTO `history`(`username`, `message`, `recipient`, `date_added`) VALUES ('$name','$code','$locale','$image')";

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
