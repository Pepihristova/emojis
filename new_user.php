<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="includes/style.css">
	<?php 
	include "includes/db_connect.php";
	?>
	<title></title>
</head>
<body>
	<div class="container">
	<form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" name="user" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-lg-6">
      <input type="password" class="form-control" name="pass" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-lg-6">
      <input type="password" class="form-control" name="pass_confirm" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Log in</button>
    </div>
  </div>
</form>
</div>
<?php 
$user_exist = "SELECT * FROM user";
$result = mysqli_query($conn, $user_exist);

	if (isset($_POST['submit'])) {
       $name = mysqli_real_escape_string( $conn, $_POST['user']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
$pass_confirm = mysqli_real_escape_string( $conn, $_POST['pass_confirm']);
if ($pass === $pass_confirm ) {


$options = [
    'cost' => 12,
];
$password_hashed = password_hash( $pass, PASSWORD_BCRYPT, $options);
      $q_create = "INSERT INTO `user`(`username`, `pass`) VALUES ('$name','$password_hashed')";

      $result = mysqli_query($conn, $q_create);
      $q_create_recipient = "INSERT INTO `recipient`(`name`) VALUES ('$name')";

      $result = mysqli_query($conn, $q_create_recipient);
      if ($result) {
        header('Location: login.php');
      }else{
        echo mysqli_error($conn);
      }
    }
    }
 ?>
</body>
</html>






