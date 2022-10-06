<?php
	session_start();
	if ($_SESSION['login_statuss'] != true) {
		echo '<script>window.location="login.php"</script>';
	}
	error_reporting(0);
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

	<!-- all product -->
	<div class="section">
		<div class="container">
			<div class="line" style="margin-top: 5px;">
				<h2 style="text-align: center; font-family: sans; color: #000;">ALL PRODUCTS</h2>
			</div>
			<div class="box-p">
				<?php
					if($_GET['search'] != '' || $_GET['cat'] != '') {
						$where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['cat']."%' ";
					}

					$product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id ASC");
					if (mysqli_num_rows($product) > 0) {
						while ($p = mysqli_fetch_array($product)) {
				?>
					<a href="detail-product.php?id=<?php echo $p['product_id'] ?>">
						<div class="col-4">
							<img src="product/<?php echo $p['product_image'] ?>">
							<p class="name"><b><?php echo substr($p['product_name'], 0, 30) ?></b></p>
							<p class="price"><i class="fa fa-usd" style="font-size:14px"></i> <?php echo number_format($p['product_price']) ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p style="text-align:center;">There's No Product</p>
				<?php } ?>
			</div>
		</div>
	</div>
	
	<div class="cpy_" style="text-align: center; margin-top: 142px;">
		<small style="color: #fff">Copyright &copy; 2022 - Marichy</small>
	</div>
</body>
</html>