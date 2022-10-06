<?php
	session_start();
	if ($_SESSION['login_statuss'] != true) {
		echo '<script>window.location="login.php"</script>';
	}
	error_reporting(0);
	include 'db.php';

	$product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($product);
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
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
						<input type="text" name="search" placeholder="Find Product" value="<?php echo $_GET['search'] ?>">
						<input type="hidden" name="cat" value="<?php echo $_GET['cat'] ?>">
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

	<!-- product detail -->	
	<div class="section">
		<div class="container">
			<h3>PRODUCT DETAIL</h3>
			<div class="box">
				<div class="col-1">
					<img src="product/<?php echo $p->product_image ?>" width="100%">
				</div>
				<div class="col-1">
					<h3><?php echo $p->product_name ?></h3>
					<h4>IDR <?php echo number_format($p->product_price) ?> <i class='fas fa-tag' style='font-size:14px; color: grey;'></i></h4>
					<p><b>Description :</b><br>
						<?php echo $p->product_description ?>
					</p>
					<div class="btn-p">
               			<a href="add_cart.php"><i class="fas fa-cart-plus" style="font-size: 18px;"></i></a>
            		</div>
				</div>
			</div>
		</div>
	</div>
	

	<!-- footer 
	<footer class="cop">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="information_f">
                        <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                        <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                        <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                      </div>
				</div>
			</div>
		</div>
	</footer> -->
	<div class="cpy_" style="text-align: center; margin-top: 0px;">
		<small style="color: #fff">Copyright &copy; 2022 - Marichy</small>
	</div>
</body>
</html>