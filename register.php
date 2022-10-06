<?php
	include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-regis">
	<div class="box-regis">
		<h2 class="line-reg">REGISTRATION</h2>
		<form action="" method="POST">
			<label for="name">Name</label>
			<input type="text" name="name" placeholder="Enter your full name..." class="input-control-reg" required>
			<label for="user">Username</label>
			<input type="text" name="user" placeholder="Enter a username..." class="input-control-reg" required>
			<label for="hp">Phone Number</label>
			<input type="text" name="hp" placeholder="Enter your phone number..." class="input-control-reg" required>
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="Enter your email..." class="input-control-reg" required>
			<label for="address">Address</label>
			<input type="text" name="address" placeholder="Enter your address..." class="input-control-reg" required>
			<label for="pass">Password</label>
			<input type="password" name="pass" placeholder="Enter your password..." class="input-control-reg" required>
			<input type="submit" name="submit" value="Sign Up" class="btn-regis">
		</form>
		<?php
			if(isset($_POST['submit'])){

				$name 	= $_POST['name'];
				$user 	= $_POST['user'];
				$hp 	= $_POST['hp'];
				$email 	= $_POST['email'];
				$address= $_POST['address'];
				$pass 	= $_POST['pass'];

				$insert = mysqli_query($conn, "INSERT INTO tb_user VALUES (
										null,
										'".$name."',
										'".$user."',
										'".MD5($pass)."',
										'".$hp."',
										'".$email."',
										'".$address."') ");
				if($insert){
					echo '<script>alert("Register Success!")</script>';
					echo '<script>window.location="login.php"</script>';
				}else{
					echo 'Failed to Sign Up'.mysqli_error($conn);
				}
			}
		?>
	</div>
</body>
</html>