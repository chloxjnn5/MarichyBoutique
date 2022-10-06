<?php
	error_reporting(0);
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
			</ul>
		</div>
	</header>

	<!-- banner -->
	<a href="cart.php"><img src="img/Boutique.jpg" alt="" width="100%"></a>

	<!-- search
	<div class="search">
		<div class="container">
			<form action="product.php">
				<input type="text" name="search" placeholder="Find Product">
				<input type="submit" name="find" value="Find Product">
			</form>
		</div>
	</div> -->

	<!-- category -->
	<div class="section">
		<div class="container">
			<div class="box-h">
				<h1 class="line" style="text-align: center; font-family: sans; color: #000; margin-top: 10px; margin-bottom: 20px;">CATEGORY</h1>
				<?php
					$category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id ASC");
					if (mysqli_num_rows($category) > 0) {
						while ($c = mysqli_fetch_array($category)) {
				?>
					<a href="product.php?cat=<?php echo $c['category_id'] ?>">
						<div class="col-5">
							<img src="category/<?php echo $c['category_image'] ?>">
							<p><b><?php echo $c['category_name'] ?></b></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p style="text-align: center; margin: 10px">There's No Category</p>
				<?php } ?>
			</div>
		</div>
	</div>


	<!-- new product -->
	<div class="section">
		<div class="container">
			<div class="line">
				<h1 style="text-align: center; font-family: sans; color: #000;">NEW ARRIVAL</h1>
			</div>
			<div class="box-p">
				<?php
					$product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 3");
					if (mysqli_num_rows($product) > 0) {
						while ($p = mysqli_fetch_array($product)) {
				?>
					<a href="detail-product.php?id=<?php echo $p['product_id'] ?>">
						<div class="col-3">
							<img src="product/<?php echo $p['product_image'] ?>">
							<p class="name"><b><?php echo substr($p['product_name'], 0, 30) ?></b></p>
							<p class="price"><i class="fa fa-usd" style="font-size:14px"></i> <?php echo number_format($p['product_price']) ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>There's No New Arrival</p>
				<?php } ?>
			</div>
			<div class="btn-box">
               <a href="product.php">View All Products</a>
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