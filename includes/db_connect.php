<?php 

$conn = mysqli_connect('localhost', 'root', '', 'emojis');

if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
} else {
	//echo '<h1>Connected successfully!</h1>';
}

