<?php

session_start();

require 'functions.php';

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = " SELECT * FROM user WHERE username = '$username' ";
	$cek_user = mysqli_query(koneksi(), $query);

	if (mysqli_num_rows($cek_user) === 1){
		$row = mysqli_fetch_assoc($cek_user);

		if(password_verify($password, $row['password'])){
			$_SESSION['submit'] = true ;
			header("Location: admin.php");
			exit;
		}
	}
	$error = true;
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Latihan5e</title>
	<style>

		body {
			background-color: white;
			background-image: url(asset/img/login3.jpg);
			background-size: 1200px;

		}
		p {
			color: red;
			font-style: italic;
		}
		img {
			border-radius: 50%;
			width: 90px;
			height: 90px;

		}
		.container {
			border-top-left-radius: 20%;
			border-top-right-radius: 20%;
			border-bottom-right-radius: 20%;
			border-bottom-left-radius: 20%;

			position: relative;
			top: 100px;
			margin: auto;
			width: 400px;
			height: 500px;
			background-color: white;
			text-align: center;
			opacity: 0.7;
		}
		.pas {
			padding-left: 3px;
		}
		.use {
			margin: 7px;
			padding: 3px;
			padding-right: 30px;
		}
		button {
			margin-right: 240px;
		}
		label {
			font-style:sans-serif;
		}
		h1 {
			
			font-family: Times new Roman;
		}
	</style>
</head>
<body>
	<div class="container">
	<h1>Login Admin</h1>

	<img src="asset/img/dd.jpg">

	<?php if (isset($error)) : ?>
		<p>Username / Password Salah</p>
	<?php endif; ?>

	<form method="post" action="">
		<label for="username">Username : </label>
		<input type="text" name="username" id="username" class="use"> <br>

		<label for="password" class="pas">Password : </label>
		<input type="password" name="password" id="password" class="use"> <br>

	<!-- 	<input type="checkbox" name="remember" id="remember" >
		<label for="remember" >Remember Me </label><br> -->

        <a href="registrasi.php" class="register">Register</a><br>
        <button type="submit" name="submit" class="sub" style="margin: 10px;">Login</button>
	</form>
	<div><button  style="margin:10px; "><a href="index.php">Batal Login</a></button></div>
	</div>
</body>
</html>