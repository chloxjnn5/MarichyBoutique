<?php
	session_start();
	if ($_SESSION['login_statuss'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

	error_reporting(0);
	include 'db.php';

	$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = '".$_SESSION['idu']."'");
	$u = mysqli_fetch_object($query);

	// $welcome = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = '".$_GET['idu']."' ");
	// $w = mysqli_fetch_object($welcome);
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

	<div class="section">
		<div class="container">
			<div class="line">
				<h2 style="text-align: center; font-family: sans; color: #000;">MY CART</h2>
			</div>
			<div class="box-h" style="margin-top: 20px;">
				<p style="margin-bottom: 10px;"><a href="add_cart.php"><b>ADD ORDER</b></a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="70px">No</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th width="300px">Order Request</th>
							<th>Payment Method</th>
							<th width="150px">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$user = $_SESSION['idu'];
							$cart = mysqli_query($conn, "SELECT * FROM tb_cart LEFT JOIN tb_product USING (product_id) WHERE user_id = '".$user."' " );
							if(mysqli_num_rows($cart) > 0){
							while ($row = mysqli_fetch_array($cart)) {
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['product_name'] ?></td>
							<td><?php echo $row['amount'] ?></td>
							<td><?php echo $row['request'] ?></td>
							<td><?php echo $row['payment'] ?></td>
							<td>
								<a href="edit_cart.php?ido=<?php echo $row['cart_id'] ?>"><b>Edit</b></a> | <a href="delete.php?ido=<?php echo $row['cart_id'] ?>" onclick="return confirm('Are you sure you want to delete this order ?')"><b>Delete</b></a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="6"><p>Welcome <?php echo $u->user_name ?>,</p><p>your cart is still empty :(</p></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
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
	<div class="cpy_" style="text-align: center; margin-top: 373px;">
		<small style="color: #fff">Copyright &copy; 2022 - Marichy</small>
	</div>
</body>
</html>