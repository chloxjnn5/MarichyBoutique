<?php
	session_start();
	if ($_SESSION['login_statuss'] != true) {
		echo '<script>window.location="login.php"</script>';
	} 
	include 'db.php';
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
<body id="bg-ab">
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
			</ul>
		</div>
	</header>

	<!-- category -->
	<div class="section">
		<div class="container">
			<div class="box-h" style="margin: 55px 8px;">
				<h1 class="line" style="text-align: center; font-family: sans; color: #000; margin-top: 20px; margin-bottom: 20px;">About Us</h1>
				<div class="col-2">
					<img src="img/pose.jpg">
				</div>
				<div id="ab">
					<h4 style="font-family: sans; margin-top: 60px;">WHO WE ARE</h4>
					<p style="font-family: sans; margin-top: 10px;">Born from the value that we believe in that women must believe in themselves, embrace their warm, empowering and confident side. We give you a destination for modern elegant wardrobe, with a focus on craftmanship.</p>
					<h4 style="font-family: sans; margin-top: 50px;">ABOUT MARICHY</h4>
					<p style="font-family: sans; margin-top: 10px;">Marichy Boutique is part of Marichy Group. Founded in 2022 and dedicated to creating an online fashion company in the developing world.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="cpy_" style="text-align: center; margin-top: 0px;">
		<small style="color: #fff">Copyright &copy; 2022 - Marichy</small>
	</div>
</body>
</html>