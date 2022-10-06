<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
	<div class="box-login">
		<h2>LOGIN</h2>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input-control">
			<input type="password" name="pass" placeholder="Password" class="input-control">
			<input type="submit" name="submit" value="Login" class="btn-log">
		</form>
		<div>
			<b><p>Don't have an account?</p><a href="register.php"><u>Register Now</u></a></b>
		</div>
		<?php
			if(isset($_POST['submit'])){
				session_start();
				include 'db.php';

				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);

				$check = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '".$user."' AND password = '".MD5($pass)."' ");
				if(mysqli_num_rows($check) > 0){
					$d = mysqli_fetch_object($check);
					$_SESSION['login_statuss'] = true;
					$_SESSION['a_global'] = $d->user_name;
					$_SESSION['idu'] = $d->user_id;
					echo '<script>window.location="index.php"</script>';
				}else{
					echo '<script>alert("Username or Password you entered is wrong!")</script>';
				}
			}
		?>
	</div>
</body>
</html>