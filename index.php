<?php 
	session_start();
 ?>
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
      <button type="submit" class="btn btn-default">Log in</button>
      <a class="btn btn-default" href="new_user.php">Sign in</a>
      <a class="btn btn-default" href="new_user.php">Log out</a>
    </div>
  </div>
</form>
</div>
<?php 
$user_exist = "SELECT * FROM user";
$result = mysqli_query($conn, $user_exist);

while ($row= mysqli_fetch_assoc($result)) {
		
		$id = $row['user_id'];
		$name1=$row['username'];
		$pass1=$row['pass'];

	
	if (!empty($_POST)) {
     $user = mysqli_real_escape_string( $conn, $_POST['user']);
     $pass = mysqli_real_escape_string( $conn, $_POST['pass']);
     $options = [
     'cost' => 12,
 ];
$password_hashed = password_hash($pass, PASSWORD_BCRYPT, $options);
		if ($user===$name1 && (password_verify($pass, $password_hashed))) {
      $id1 = $id;
			header('Location: type_to.php');
		}else{
			echo "Wrong username or password! Please try again!";
		}
		$_SESSION['user'] = $user;
    $_SESSION['user_id'] = $id1;
	}
}
 ?>
</body>
</html>





