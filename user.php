<?php
	session_start();
	include 'db.php';
	if ($_SESSION['login_statuss'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = '".$_SESSION['idu']."'");
	$u = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Marichy Boutique</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-h">
	<!-- header -->
	<header class="head">
		<div class="container">
			<h1><a href="index.php">Marichy Boutique</h1>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="product.php">Product</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li>
					<a href="cart.php" style="color: #fff;">
						<i class="fa fa-shopping-cart" style="font-size: 20px; color: #fff;"></i>
					</a>
				</li>
				<li>
					<form action="product.php" class="search">
						<input type="text" name="search" placeholder="Find Product">
						<input type="submit" name="find" value="Find">
					</form>
				</li>
				<li>
					<a href="user.php">
						<i class="fa fa-user" style="font-size:20px"></i>
					</a>
				</li>
				<li>
					<a href="logoutt.php">
						<i class="fa fa-sign-out" style="font-size:20px"></i>
					</a>
				</li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<div class="box-h" style="text-align: center;">
				<h2 style="font-family: sans;">Welcome <?php echo $u->user_name ?></h2>
				<p style="margin-top: 5px;">In this page you can edit your profile and your password account.</p>
			</div>
			<br>
			<h3>PROFILE</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="name" placeholder="Full Name" class="input-control" value="<?php echo $u->user_name ?>" required>
					<input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $u->username ?>" required>
					<input type="text" name="hp" placeholder="Phone Number" class="input-control" value="<?php echo $u->user_telp ?>" required>
					<input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $u->user_email ?>" required>
					<input type="text" name="address" placeholder="Address" class="input-control" value="<?php echo $u->user_address ?>" required>
					<input type="submit" name="submit" value="Update Profile" class="btn-profile">
				</form>
				<?php
					if(isset($_POST['submit'])){

						$name 	= ucwords($_POST['name']);
						$user 	= $_POST['user'];
						$hp 	= $_POST['hp'];
						$email 	= $_POST['email'];
						$address= ucwords($_POST['address']);

						$update = mysqli_query($conn, "UPDATE tb_user SET 
										user_name = '".$name."',
										username = '".$user."',
										user_telp = '".$hp."',
										user_email = '".$email."',
										user_address = '".$address."'
										WHERE user_id = '".$u->user_id."' ");
						if($update){
							echo '<script>alert("Updated Successfully!")</script>';
							echo '<script>window.location="user.php"</script>';
						}else{
							echo 'Failed'.mysqli_error($conn);
						}
					}
				?>
			</div>
			
			<h3>Password</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="password" name="pass1" placeholder="New Password" class="input-control" required>
					<input type="password" name="pass2" placeholder="Password Confirmation" class="input-control" required>
					<input type="submit" name="submitt" value="Update Password" class="btn-profile">
				</form>
				<?php
					if(isset($_POST['submitt'])){

						$pass1 	= $_POST['pass1'];
						$pass2	= $_POST['pass2'];

						if ($pass2 != $pass1){
							echo '<script>alert("New Password Confirmation is wrong!")</script>';
						}else{

							$u_pass = mysqli_query($conn, "UPDATE tb_user SET
										password = '".MD5($pass1)."'
										WHERE user_id = '".$u->user_id."' ");
							if ($u_pass) {
								echo '<script>alert("Updated Successfully!")</script>';
								echo '<script>window.location="user.php"</script>';
							}else{
								echo 'Failed'.mysqli_error($conn);
							}
						}
					}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer class="cop">
		<div class="container">
			<div class="section">
				<div class="foot">
					<div class="left-box">
						<i class="fa fa-map-marker" aria-hidden="true"> 28 White tower, New York City, USA</i><br>
	               <i class="fa fa-phone" aria-hidden="true"> Call : +62 890 1234 5678</i><br>
	               <i class="fa fa-envelope" aria-hidden="true"> marichy@gmail.com</i>
					</div>
					<div class="center-box">
							<a href="#">
		                  <i class="fa fa-facebook" aria-hidden="true" style="font-size: 24px;"></i>
		               </a>
		               <a href="#">
		                  <i class="fa fa-twitter" aria-hidden="true" style="font-size: 24px;"></i>
		               </a><!-- 
		               <a href="">
		       	         <i class="fa fa-linkedin" aria-hidden="true" style="font-size: 24px;"></i>
		               </a> -->
		               <a href="https://www.instagram.com/clau_han/">
		                  <i class="fa fa-instagram" aria-hidden="true" style="font-size: 24px;"></i>
		               </a>
		               <a href="https://id.pinterest.com/pin/749919775466156038/">
		   	            <i class="fa fa-pinterest" aria-hidden="true" style="font-size: 24px;"></i>
		   	         </a>
		               <a href="https://www.youtube.com/channel/UCEIklot_7NLhUv6gT_Gh0Qg">
		       	         <i class="fa fa-youtube-play" aria-hidden="true" style="font-size: 24px;"></i>
		               </a>
					</div>
					<div class="right-box">
						<h3>MENU</h3>
						<!-- <ul>
	               <li> --><a href="index.php">HOME |</a><!-- </li>
	               <li> --><a href="about.php">ABOUT US |</a><!-- </li>
	               <li> --><a href="contact.php">CONTACT</a><!-- </li>
	               </ul> -->
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="cpy_" style="text-align: center; margin-top: 0px;">
		<small style="color: #fff">Copyright &copy; 2022 - Marichy</small>
	</div>
</body>
</html>