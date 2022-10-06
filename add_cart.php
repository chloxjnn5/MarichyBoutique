<?php
	session_start();
	if ($_SESSION['login_statuss'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

	error_reporting(0);
	include 'db.php';
	
	// $users = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = '".$_GET['idu']."' ");
	$u = $_SESSION['idu'];
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
<body id="bg-ad">
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
				<h3 style="text-align: center; color: #000; margin-top: 10px;">ADD ORDER</h>
			</div>
			<div class="box" style="margin-top: 30px;">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="name" required>
						<option value="">-Choose Product-</option>
						<?php
							$prod = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC");
							while($c = mysqli_fetch_array($prod)){
						?>
						<option value="<?php echo $c['product_id'] ?>"><?php echo $c['product_name'] ?></option>
						<?php } ?>
					</select>
					<label for="quantity">Quantity :</label>
  					<input type="number" id="quantity" class="input-control" style="margin-top: 10px;" name="quantity" min="1" max="100" required>
					<textarea class="input-control" name="request" placeholder="Order Request (size, etc)"></textarea>
					<select class="input-control" name="payment" required>
						<option value="">- Choose Payment Method -</option>
						<option value="COD">COD</option>
						<option value="Transfer Bank">Transfer Bank</option>
						<option value="Credit/Debit Card">Credit/Debit Card</option>
					</select>
					<input type="submit" name="submit" value="Add" class="btn-profile">
				</form>
				<?php
					if(isset($_POST['submit'])) {

						$user 		= $u;
						$name 		= $_POST['name'];
						$quantity 	= $_POST['quantity'];
						$request 	= $_POST['request'];
						$payment	= $_POST['payment'];

						$insert = mysqli_query($conn, "INSERT INTO tb_cart VALUES (
										null,
										'".$user."',
										'".$name."',
										'".$quantity."',
										'".$request."',
										'".$payment."',
										null
											) ");
						if($insert) {
							echo '<script>alert("Successfully Added")</script>';
							echo '<script>window.location="cart.php"</script>';
						}else{
							echo 'Failed to add product'.mysqli_error($conn);
						}
					}
				?>
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
	<div class="cpy_" style="text-align: center; margin-top: 138px;">
		<small style="color: #fff">Copyright &copy; 2022 - Marichy</small>
	</div>
</body>
</html>